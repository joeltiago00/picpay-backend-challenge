<?php

namespace PicPay\CentralBank\Infrastructure\Client;

use Illuminate\Support\Facades\Http;
use PicPay\CentralBank\Domain\Contracts\Client;

class HttpClient implements Client
{

    public function get(string $url): Response
    {
        return new Response(Http::baseUrl(config('integrations.central-bank.base-url'))->get($url));
    }
}
