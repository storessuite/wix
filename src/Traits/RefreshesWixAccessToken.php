<?php

namespace StoresSuite\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use StoresSuite\Enums\AccessTokenValidity;
use StoresSuite\Models\WixAccessToken;
use StoresSuite\Models\WixSite;
use StoresSuite\WixApi\V1\Oauth;

trait RefreshesWixAccessToken
{
    public function refreshAccessToken(WixSite $wixSite): WixAccessToken
    {
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
}
