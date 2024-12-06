<?php

namespace StoresSuite\Wix\Services;

use StoresSuite\Wix\Models\WixAccessToken;
use StoresSuite\Wix\Models\WixRefreshToken;
use StoresSuite\Wix\Models\WixSite;

class WixAuthService
{
    public function saveRefreshToken(array $tokenDetails)
    {
        return WixRefreshToken::query()->create($tokenDetails);
    }

    public function saveAccessToken(array $tokenDetails)
    {
        return WixAccessToken::query()->create($tokenDetails);
    }

    public function refreshToken(WixSite $wixSite) {}

    public function generateToken(string $authorizationCode) {}
}
