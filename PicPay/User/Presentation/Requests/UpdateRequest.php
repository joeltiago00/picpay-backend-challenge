<?php

namespace PicPay\User\Presentation\Requests;

use PicPay\CoreDomain\Presentation\Requests\FormRequest;
use PicPay\User\Presentation\Rules\UniqueCpf;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        // TODO:: verify permission
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['nullable', 'string', 'min:3', 'max:20'],
            'last_name' => ['nullable', 'string', 'min:3', 'max: 80'],
        ];
    }
}
