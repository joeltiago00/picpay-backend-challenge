<?php

namespace PicPay\Message\Domain\Actions\SMS;

use PicPay\Shared\Domain\Contracts\Client;
use Symfony\Component\HttpFoundation\Response;

readonly class Send
{
    public function __construct(private Client $client)
    {
    }

    public function handle(string $phoneNumber, string $message): bool
    {
        $response = $this->client->get(config('integrations.sms-sender.urls.send'));

        return $response->status() === Response::HTTP_OK;
    }
}
