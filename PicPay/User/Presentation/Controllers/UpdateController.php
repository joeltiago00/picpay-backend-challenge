<?php

namespace PicPay\User\Presentation\Controllers;

use Illuminate\Http\Response;
use PicPay\User\Domain\Actions\Update;
use PicPay\User\Presentation\Requests\UpdateRequest;

class UpdateController
{
    public function __invoke(UpdateRequest $request, Update $action, int $userId): Response
    {
        $action->handle($userId, $request->validated());

        return response()->noContent();
    }
}
