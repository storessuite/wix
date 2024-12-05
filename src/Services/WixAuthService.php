<?php

namespace StoresSuite\Wix\Services;

use StoresSuite\Wix\Models\WixAccessToken;

class WixAuthService
{
    public function saveRefreshToken(array $tokenDetails)
    {
        return WixAccessToken::query()->create($tokenDetails);
    }

    public function saveAccessToken(array $tokenDetails)
    {
        return WixAccessToken::query()->create($tokenDetails);
    }
}
