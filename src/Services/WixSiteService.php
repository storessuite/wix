<?php

namespace StoresSuite\Wix\Services;

use StoresSuite\Wix\Models\WixSite;

class WixSiteService
{
    public function create(array $wixSiteDetails): WixSite
    {
        return WixSite::query()->updateOrCreate([
            '_id' => $wixSiteDetails['_id'],
        ], $wixSiteDetails);
    }

    public function fetch(WixSite $wixSite): WixSite {}
}
