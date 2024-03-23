<?php

namespace PicPay\User\Presentation\Requests;

use PicPay\CoreDomain\Presentation\Requests\FormRequest;
use PicPay\User\Presentation\Rules\UniqueCpf;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        // TODO:: verify permission
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:20'],
            'last_name' => ['nullable', 'string', 'min:3', 'max: 80'],
            'email' => ['required', 'string', 'email:rfc,filter', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:64', 'confirmed'],
            'type_id' => ['required', 'integer', 'exists:user_types,id'],
            'document' => ['required', 'array'],
            'document.type_id' => ['required', 'integer', 'exists:document_types,id'],
            'document.value' => ['required', 'string', 'min:11', 'max:16', new UniqueCpf($this)]
        ];
    }
}
