<?php

namespace StoresSuite\Wix\Services;

use StoresSuite\Wix\Models\WixAccessToken;
use StoresSuite\Wix\Models\WixInstance;

class WixInstanceService
{
    public function fetchUsingToken(WixAccessToken $token): WixInstance {}
}
