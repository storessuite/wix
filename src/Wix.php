<?php

namespace StoresSuite\Wix;

use StoresSuite\Wix\Services\WixAppService;
use StoresSuite\Wix\Services\WixAuthService;
use StoresSuite\Wix\Services\WixCollectionService;
use StoresSuite\Wix\Services\WixInstanceService;
use StoresSuite\Wix\Services\WixInventoryService;
use StoresSuite\Wix\Services\WixProductService;
use StoresSuite\Wix\Services\WixSiteService;
use StoresSuite\Wix\Services\WixVariantService;

class Wix
{
    public static function instance(WixInstanceService $wixInstanceService): WixInstanceService
    {
        return $wixInstanceService;
    }

    public static function site(WixSiteService $wixSiteService): WixSiteService
    {
        return $wixSiteService;
    }

    public static function product(WixProductService $wixProductService): WixProductService
    {
        return $wixProductService;
    }

    public static function variant(WixVariantService $wixVariantService): WixVariantService
    {
        return $wixVariantService;
    }

    public static function auth(WixAuthService $wixAuthService): WixAuthService
    {
        return $wixAuthService;
    }

    public static function app(WixAppService $wixAppService): WixAppService
    {
        return $wixAppService;
    }

    public static function collection(WixCollectionService $wixCollectionService): WixCollectionService
    {
        return $wixCollectionService;
    }

    public static function inventory(WixInventoryService $wixInventoryService): WixInventoryService
    {
        return $wixInventoryService;
    }
}
