<?php

namespace PicPay\Shared\Infrastructure\Client;

use Illuminate\Support\Facades\Http;
use PicPay\Shared\Domain\Contracts\Client;

class HttpClient implements Client
{

    public function get(string $url): Response
    {
        return new Response(Http::baseUrl(config('integrations.base-url'))->get($url));
    }
}
