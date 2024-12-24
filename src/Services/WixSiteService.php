<?php

namespace StoresSuite\Wix\Services;

use StoresSuite\Wix\Models\WixSite;
use StoresSuite\Wix\Models\WixSiteProperty;

class WixSiteService
{
    public function __construct() {}

    public function create(array $wixSiteDetails): WixSite
    {
        return WixSite::query()->updateOrCreate([
            '_id' => $wixSiteDetails['_id'],
        ], $wixSiteDetails);
    }

    public function fetch(WixSite $wixSite): WixSite {}

    public function fetchProperties(WixSite $wixSite): WixSiteProperty {}
}
