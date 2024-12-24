<?php

namespace StoresSuite\Wix\WixApi\V1;

use Illuminate\Support\Facades\Http;

class Site
{
    /**
     * Get site properties
     *
     * @param string $token
     * @return array
     */
    public function getSiteProperties(string $token): array
    {
        $endPoint = 'https://www.wixapis.com/site-properties/v4/properties';
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => $token
        ];

        return Http::withHeaders($headers)->get($endPoint)->json();
    }
}
