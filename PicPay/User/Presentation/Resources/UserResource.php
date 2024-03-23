<?php

namespace PicPay\User\Presentation\Resources;

use Illuminate\Http\Request;
use PicPay\CoreDomain\Presentation\Resources\Resource;

class UserResource extends Resource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'type_id' => $this->type_id,
            'status_id' => $this->status_id,
            'document' => DocumentResource::make($this->document)
        ];
    }
}
