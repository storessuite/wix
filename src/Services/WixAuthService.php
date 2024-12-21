<?php

namespace StoresSuite\Wix\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use StoresSuite\Wix\Enums\AccessTokenValidity;
use StoresSuite\Wix\Exceptions\APIException;
use StoresSuite\Wix\Models\WixAccessToken;
use StoresSuite\Wix\Models\WixRefreshToken;
use StoresSuite\Wix\Models\WixSite;
use StoresSuite\Wix\WixApi\V1\Oauth;

class WixAuthService
{
    /**
     * Save refresh token
     *
     * @param array $tokenDetails
     * @return WixRefreshToken
     */
    public function saveRefreshToken(array $tokenDetails): WixRefreshToken
    {
        return WixRefreshToken::query()->create($tokenDetails);
    }

    /**
     * Save access token
     *
     * @param array $tokenDetails
     * @return WixAccessToken
     */
    public function saveAccessToken(array $tokenDetails): WixAccessToken
    {
        return WixAccessToken::query()->create($tokenDetails);
    }

    /**
     * Refresh token
     *
     * @param WixSite $wixSite
     * @param Oauth $oauthApi
     * @return WixAccessToken
     * @throws APIException
     */
    public function refreshToken(WixSite $wixSite, Oauth $oauthApi): WixAccessToken
    {
        if ($wixSite->accessToken->isValidFor(AccessTokenValidity::GRACE_PERIOD_BEFORE_EXPIRY)) {
            return $wixSite->accessToken;
        }

        $apiResponse = $oauthApi->refreshAccessToken(
            Config::get('wix.client_id'),
            Config::get('wix.client_secret'),
            Crypt::decrypt($wixSite->refreshToken->refresh_token)
        );

        if ($apiResponse['access_token'] ?? false) {
            throw new APIException();
        }

        return $wixSite->accessTokens()->create([
            'access_token' => Crypt::encrypt($apiResponse['access_token']),
            'expired_at' => Carbon::now()->addMinutes(AccessTokenValidity::VALIDITY_PERIOD->value)
        ]);
    }

    /**
     * Generate token
     *
     * @param string $authorizationCode
     * @return array
     */
    public function generateToken(string $authorizationCode): array {}
}
