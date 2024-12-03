<?php

namespace StoresSuite\Wix\WixApi\V1;

use Illuminate\Support\Facades\Http;

class Oauth
{
    public function refreshAccessToken(string $clientId, string $clientSecret, string $refreshToken)
    {
        $endPoint = 'https://www.wixapis.com/oauth/access/';
        $data = [
            'grant_type' => 'refresh_token',
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'refresh_token' => $refreshToken
        ];
        $headers = [
            'Content-Type' => 'application/json'
        ];

        return Http::withHeaders($headers)->post($endPoint, $data)->json();
    }

    public function requestAccessToken(string $authorizationCode, string $clientId, string $clientSecret)
    {
        $endPoint = 'https://www.wixapis.com/oauth/access/';
        $data = [
            'grant_type' => 'authorization_code',
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'code' => $authorizationCode
        ];
        $headers = [
            'Content-Type' => 'application/json'
        ];

        return Http::withHeaders($headers)->post($endPoint, $data)->json();
    }
}
