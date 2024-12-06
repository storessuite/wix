<?php

namespace StoresSuite\Wix\Services;

use StoresSuite\Wix\Models\WixSite;

class WixAppService
{
    public function redirectToDashboard(WixSite $wixSite) {}

    public function redirectToInstallationPage(string $token, string $state = null) {}

    public function closeWindow(string $accessToken) {}
}
