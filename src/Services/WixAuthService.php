<?php

namespace StoresSuite\Wix\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use StoresSuite\Wix\Enums\AccessTokenValidity;
use StoresSuite\Wix\Models\WixAccessToken;
use StoresSuite\Wix\Models\WixRefreshToken;
use StoresSuite\Wix\Models\WixSite;
use StoresSuite\Wix\WixApi\V1\Oauth;

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

    public function refreshToken(WixSite $wixSite) {
        if ($wixSite->accessToken->isValidFor(AccessTokenValidity::GRACE_PERIOD_BEFORE_EXPIRY->value)) {
            return $wixSite->accessToken;
        }

        $oauthApi = new Oauth();
        $apiResponse = $oauthApi->refreshAccessToken(Config::get('wix.client_id'), Config::get('wix.client_secret'), $wixSite->refreshToken->refresh_token);
        return $wixSite->accessTokens()->create([
            'access_token' => $apiResponse['access_token'],
            'expired_at' => Carbon::now()->addMinutes(AccessTokenValidity::VALIDITY_PERIOD->value)
        ]);
    }

    public function generateToken(string $authorizationCode) {}
}
