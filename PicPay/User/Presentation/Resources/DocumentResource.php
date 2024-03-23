<?php

namespace PicPay\User\Presentation\Resources;

use Illuminate\Http\Request;
use PicPay\CoreDomain\Presentation\Resources\Resource;
use PicPay\User\Infrastructure\Enums\DocumentType;

class DocumentResource extends Resource
{
    public function toArray(Request $request)
    {
        return [
            'type_id' => $this->type_id,
            'type_name' => DocumentType::tryFrom($this->type_id),
            'value' => $this->value
        ];
    }
}
