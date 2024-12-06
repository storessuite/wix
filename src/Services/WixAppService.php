<?php

namespace StoresSuite\Wix\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use StoresSuite\Wix\Models\WixSite;

class WixAppService
{
    public function redirectToDashboard(WixSite $wixSite)
    {
        $appId = Config::get('wix.app_id');
        $appDashboardUrl = 'https://manage.wix.com/dashboard/' . $wixSite->_id . '/app/' . $appId;
        return Redirect::to($appDashboardUrl);
    }

    public function redirectToInstallationPage(string $token, string $state = null)
    {
        $appId = Config::get('wix.app_id');
        $redirectUrl = Config::get('wix.redirect_url');
        $installationUrl = Config::get('wix.installation_url') . '?appId=' . $appId . '&redirectUrl=' . $redirectUrl;

        if ($token) {
            $installationUrl .= '&token=' . $token;
        }

        if ($state) {
            $installationUrl .= '&state=' . $state;
        }

        return Redirect::to($installationUrl);
    }

    public function closeWindow(string $accessToken)
    {
        $closeWindowUrl = 'https://www.wix.com/installer/close-window?access_token=' . $accessToken;
        return Redirect::to($closeWindowUrl);
    }
}
