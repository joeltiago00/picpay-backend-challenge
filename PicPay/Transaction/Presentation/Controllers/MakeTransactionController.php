<?php

namespace PicPay\Transaction\Presentation\Controllers;

use Illuminate\Http\Response;
use PicPay\Transaction\Application\MakeTransaction;
use PicPay\Transaction\Presentation\Requests\MakeTransactionRequest;

class MakeTransactionController
{
    public function __invoke(MakeTransactionRequest $request, MakeTransaction $action): Response
    {
        $action->handle($request->validated());

        return response()->noContent();
    }
}
