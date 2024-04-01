<?php

namespace PicPay\Transaction\Application;

use PicPay\CentralBank\Domain\Facades\CentralBank;
use PicPay\Message\Domain\Facades\Message;
use PicPay\Shared\Infrastructure\Enums\StatusEnum;
use PicPay\Transaction\Domain\Action\StoreTransaction;
use PicPay\Transaction\Domain\Entities\Transaction;
use PicPay\Transaction\Domain\Exceptions\TransactionException;
use PicPay\Transaction\Infrastructure\Enums\TypeEnum as TransactionTypeEnum;
use PicPay\User\Application\GetUser;
use PicPay\User\Application\GetUserType;
use PicPay\User\Domain\Entities\User;
use PicPay\User\Infrastructure\Enums\TypeEnum;
use PicPay\Wallet\Domain\Actions\GetWallet;

readonly class MakeTransaction
{
    public function __construct(
        private GetWallet        $getWallet,
        private GetUserType      $getUserType,
        private GetUser          $getUser,
        private StoreTransaction $storeTransaction
    )
    {
    }

    public function handle(array $data): Transaction
    {
        $payerWallet = $this->getWallet->handle($data['payer_wallet_id']);
        $payerUser = $this->getUser->handle($payerWallet->userId);

        $payeeUser = $this->getUser->handle($this->getWallet->handle($data['payee_wallet_id'])->userId);

        if ($this->getUserType->handle($payerUser->id)->value !== TypeEnum::COMMON->value) {
            throw TransactionException::userNotAuthorized();
        }

        if ((round($payerWallet->currentAmount / 100, 2) - round($data['amount'], 2)) < 0) {
            $this->storeTransaction
                ->handle([
                    ...$data,
                    'status_id' => StatusEnum::NOT_APPROVED->value,
                    'type_id' => TransactionTypeEnum::TRASNFER->value
                ]);

            throw TransactionException::userDontHaveSufficientAmount();
        }

        if (!CentralBank::authorization()->check($payerWallet->userId)) {
            $this->storeTransaction
                ->handle([
                    ...$data,
                    'status_id' => StatusEnum::NOT_AUTHORIZED->value,
                    'type_id' => TransactionTypeEnum::TRASNFER->value
                ]);

            throw TransactionException::userNotAuthorized();
        }

        $this->storeTransaction
            ->handle([
                ...$data,
                'status_id' => StatusEnum::APPROVED->value,
                'type_id' => TransactionTypeEnum::TRASNFER->value
            ]);

        Message::service('sms')
            ->send($payerUser->phoneNumber, $this->formatMessage($data['amount'], $payerUser, $payeeUser));
    }

    private function formatMessage(int $amount, User $payerUser, User $payeeUser): string
    {
        return trans('transaction.receive', [
            'payee' => $payeeUser->firstName,
            'payer' => sprintf('%s %s', $payerUser->firstName, $payerUser->lastName),
            'amount' => round($amount / 100, 2)
        ]);
    }
}
