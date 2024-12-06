<?php

namespace StoresSuite\Wix;

use StoresSuite\Wix\Services\WixAppService;
use StoresSuite\Wix\Services\WixAuthService;
use StoresSuite\Wix\Services\WixCollectionService;
use StoresSuite\Wix\Services\WixInventoryService;
use StoresSuite\Wix\Services\WixProductService;
use StoresSuite\Wix\Services\WixSiteService;
use StoresSuite\Wix\Services\WixVariantService;

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

    public static function variant(): WixVariantService
    {
        return new WixVariantService();
    }

    public static function auth(): WixAuthService
    {
        return new WixAuthService();
    }

    public static function app(): WixAppService
    {
        return new WixAppService();
    }

    public static function collection(): WixCollectionService
    {
        return new WixCollectionService();
    }

    public static function inventory(): WixInventoryService
    {
        return new WixInventoryService();
    }
}
