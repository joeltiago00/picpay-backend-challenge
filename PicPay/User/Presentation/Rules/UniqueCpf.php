<?php

namespace PicPay\User\Presentation\Rules;

use Closure;
use PicPay\CoreDomain\Presentation\Requests\FormRequest;
use PicPay\CoreDomain\Presentation\Rules\CustomRule;
use PicPay\User\Domain\Repositories\UserDocumentRepository;
use PicPay\User\Infrastructure\Enums\DocumentType;
use PicPay\User\Presentation\Exceptions\RuleException;

class UniqueCpf extends CustomRule
{

    public function __construct(private readonly FormRequest $request)
    {
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ((int) $this->request->document['type_id'] !== DocumentType::CPF->value) {
            return;
        }

        $documentAlreadyExists = (app(UserDocumentRepository::class))->getByValue($value);

        if ($documentAlreadyExists) {
            throw RuleException::cpfAlreadyExists($value);
        }
    }


}
