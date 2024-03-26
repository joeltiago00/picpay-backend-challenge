<?php

namespace PicPay\Wallet\Infrastructure\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateUserWallet
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
}
