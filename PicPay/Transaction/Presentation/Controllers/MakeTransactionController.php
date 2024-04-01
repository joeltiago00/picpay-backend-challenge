<?php

namespace PicPay\Transaction\Presentation\Controllers;

use PicPay\Transaction\Application\MakeTransaction;
use PicPay\Transaction\Presentation\Requests\MakeTransactionRequest;

class MakeTransactionController
{
    public function __invoke(MakeTransactionRequest $request, MakeTransaction $action)
    {
        $action->handle($request->validated());
    }
}
