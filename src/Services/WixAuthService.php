<?php

namespace StoresSuite\Wix\Services;

use StoresSuite\Wix\Models\WixAccessToken;
use StoresSuite\Wix\Models\WixRefreshToken;

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
}
