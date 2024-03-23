<?php

namespace PicPay\User\Infrastructure\Enums;

enum DocumentType: int
{
    case CPF = 1;
    case CNPJ = 2;
}
