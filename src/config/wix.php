<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Wix app ID
    | Can be retrieved for Wix app's dashboard.
    | More details: https://dev.wix.com/docs/build-apps/develop-your-app/access/authentication/use-advanced-oauth
    |--------------------------------------------------------------------------
    |
    */

    'app_id' => env('WIX_APP_ID'),
    'client_id' => env('WIX_APP_ID'),

    /*
    |--------------------------------------------------------------------------
    | Client secret
    | Can be retrieved for app's dashboard.
    | Required during generating and refreshing access token.
    | More details: https://dev.wix.com/docs/build-apps/develop-your-app/access/authentication/use-advanced-oauth
    |--------------------------------------------------------------------------
    |
    */

    'client_secret' => env('WIX_CLIENT_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Redirect URL
    | Should be set in app's oauth settings.
    | More details: https://dev.wix.com/docs/build-apps/develop-your-app/access/authentication/use-advanced-oauth
    |--------------------------------------------------------------------------
    | This is where Wix will redirect after user accepts all the permissions.
    | Wix will provide use: 'state' (same state that we supplied to Wix),
    | 'code' (used to generate access token), 'instanceId' (every
    | installation is assigned an instanceId).
    |
    */

    'redirect_url' => env('WIX_REDIRECT_URL'),

    /*
    |--------------------------------------------------------------------------
    | Complete URL
    |--------------------------------------------------------------------------
    | This is the final URL where user will be redirected after the installation
    | is complete. You will receive 'state' and 'wixSiteId' as query params.
    |
    */

    'complete_url' => env('WIX_COMPLETE_URL'),
];
