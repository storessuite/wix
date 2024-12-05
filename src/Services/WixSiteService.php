<?php

namespace StoresSuite\Wix\Services;

use StoresSuite\Wix\Models\WixSite;

class WixSiteService
{
    public function create(array $wixSiteDetails): WixSite
    {
        return WixSite::query()->create($wixSiteDetails);
    }
}
