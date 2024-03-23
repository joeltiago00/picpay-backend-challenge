<?php

namespace PicPay\User\Presentation\Controllers;

use Illuminate\Http\JsonResponse;
use PicPay\User\Domain\Actions\Store;
use PicPay\User\Presentation\Requests\StoreRequest;
use PicPay\User\Presentation\Resources\UserResource;
use Symfony\Component\HttpFoundation\Response;

class StoreController
{
    public function __invoke(StoreRequest $request, Store $action): JsonResponse
    {
        return UserResource::make($action->handle($request->validated()))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }
}
