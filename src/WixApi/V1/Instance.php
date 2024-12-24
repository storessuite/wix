<?php

namespace StoresSuite\Wix\WixApi\V1;

use Illuminate\Support\Facades\Http;

class Instance
{
    /**
     * Get instance details
     * 
     * More details: https://dev.wix.com/docs/rest/app-management/app-instance/get-app-instance
     *
     * @param string $token
     * @return array
     */
    public function getAppInstance(string $token): array
    {
        $endPoint = 'https://www.wixapis.com/apps/v1/instance';
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => $token
        ];

        return Http::withHeaders($headers)->post($endPoint)->json();
    }
}
