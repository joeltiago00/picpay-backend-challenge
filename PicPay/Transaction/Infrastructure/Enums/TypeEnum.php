<?php

namespace PicPay\Transaction\Infrastructure\Enums;

enum TypeEnum: int
{
    case ENTRY = 1;
    case TRASNFER = 2;
    case REFOUND = 3;
}
