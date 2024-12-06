<?php

namespace StoresSuite\Wix\Services;

use Illuminate\Database\Eloquent\Collection;
use StoresSuite\Wix\Models\WixSite;

class WixInventoryService
{
    public function fetchAll(WixSite $wixSite, Collection $wixInventories = null) {}

    public function fetchUpdated(WixSite $wixSite) {}
}
