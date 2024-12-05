<?php

namespace StoresSuite\Wix;

use StoresSuite\Wix\Services\WixProductService;
use StoresSuite\Wix\Services\WixSiteService;

class Wix
{
    public static function site(): WixSiteService
    {
        return new WixSiteService();
    }

    public static function product(): WixProductService
    {
        return new WixProductService();
    }
}
