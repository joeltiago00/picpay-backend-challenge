<?php

namespace PicPay\Transaction\Presentation\Requests;

use PicPay\CoreDomain\Presentation\Requests\FormRequest;

class MakeTransactionRequest extends FormRequest
{
    public function authorize(): bool
    {
        // TODO:: verify permission
        return true;
    }

    public function rules(): array
    {
        return [
            'payer_wallet_id' => ['required', 'string', 'exists:wallets,id'],
            'payee_wallet_id' => ['required', 'string', 'exists:wallets,id'],
            'amount' => ['required', 'integer', 'min:1'],
        ];
    }
}
