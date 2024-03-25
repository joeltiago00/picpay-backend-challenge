<?php

namespace PicPay\User\Presentation\Requests;

use PicPay\CoreDomain\Presentation\Requests\FormRequest;

class IndexRequest extends FormRequest
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
            'email' => ['nullable', 'string', 'email:rfc,filter'],
        ];
    }

    public static function macro($name, $macro)
    {
    }
}
