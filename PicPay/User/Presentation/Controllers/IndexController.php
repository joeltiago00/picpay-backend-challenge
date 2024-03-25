<?php

namespace PicPay\User\Presentation\Controllers;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use PicPay\User\Aplication\Index;
use PicPay\User\Presentation\Requests\IndexRequest;
use PicPay\User\Presentation\Resources\UserResource;

class IndexController
{
    public function __invoke(IndexRequest $request, Index $action): AnonymousResourceCollection
    {
        return UserResource::collection($action->handle($request->validated()));
    }
}
