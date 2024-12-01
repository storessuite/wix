<?php

namespace StoresSuite\WixApi\V1;

use Illuminate\Support\Facades\Http;

class Catalog
{
    public function getProduct(string $accessToken, string $_id)
    {
        $endPoint = 'https://www.wixapis.com/stores-reader/v1/products/' . $_id;
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => $accessToken
        ];

        return Http::withHeaders($headers)->get($endPoint)->json();
    }
}
