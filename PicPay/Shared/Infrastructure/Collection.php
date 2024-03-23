<?php

namespace PicPay\Shared\Infrastructure;

use Illuminate\Support\Collection as SupportCollection;

class Collection extends SupportCollection
{
    public function __construct($items)
    {
        parent::__construct($items);
    }
}
