<?php

namespace StoresSuite\Wix\Services;

use Illuminate\Database\Eloquent\Collection;
use StoresSuite\Wix\Models\WixSite;

class WixVariantService
{
    public function fetchAll(WixSite $wixSite, Collection $wixVariants = null): Collection {}
}
