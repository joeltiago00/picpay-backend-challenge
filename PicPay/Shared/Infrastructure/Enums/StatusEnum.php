<?php

namespace PicPay\Shared\Infrastructure\Enums;

enum StatusEnum: int
{
    case ACTIVE = 1;
    case INACTIVE = 2;
    case APPROVED = 3;
    case NOT_APPROVED = 4;
    case NOT_AUTHORIZED = 5;
}
