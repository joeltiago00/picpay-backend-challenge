<?php

namespace Tests\Feature\Message;

use Exception;
use PicPay\Message\Domain\Facades\Message;
use Tests\Feature\FeatureTest;

class MessageTest extends FeatureTest
{
    public function testSuccess()
    {
        $this->assertTrue(Message::send('123', 'test message'));
    }

    public function testFailInvalidMessageService()
    {
        $this->expectException(Exception::class);

        Message::service('sns')->send('123', 'test message');
    }
}
