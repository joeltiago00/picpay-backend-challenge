<?php

namespace PicPay\CoreDomain;

abstract class AbstractDomain
{
    private bool $disabled;

    public function __construct($disabled = null)
    {
        $this->disabled = $disabled ?? false;
    }

    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    public function registerProvider(): array
    {
        return [];
    }
}
