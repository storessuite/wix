<?php

namespace StoresSuite\Wix\Services;

use Illuminate\Database\Eloquent\Collection;
use StoresSuite\Wix\Models\WixProduct;
use StoresSuite\Wix\Models\WixSite;

class WixProductService
{
    public function fetchOne(WixSite $wixSite, WixProduct $wixProduct): WixProduct {}

    public function fetchAll(WixSite $wixSite, Collection $wixProducts = null): Collection {}

    public function fetchNew(WixSite $wixSite): Collection {}

    public function fetchUpdated(WixSite $wixSite): Collection {}

    public function delete(WixProduct $wixProduct): bool {}
}
