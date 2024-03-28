<?php

namespace PicPay\CentralBank\Domain\Actions;

use PicPay\CentralBank\Domain\Contracts\Client;
use Symfony\Component\HttpFoundation\Response;

readonly class Check
{
    public function __construct(private Client $client)
    {
    }

    public function handle(int $accountId): bool
    {
        $response = $this->client->get(config('integrations.central-bank.urls.check-authorization'));

        return $response->status() === Response::HTTP_NO_CONTENT;
    }
}
