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
    public function __construct(
        public WixInstanceService $wixInstanceService,
        public WixSiteService $wixSiteService,
        public WixProductService $wixProductService,
        public WixVariantService $wixVariantService,
        public WixAuthService $wixAuthService,
        public WixAppService $wixAppService,
        public WixCollectionService $wixCollectionService,
        public WixInventoryService $wixInventoryService,
    ) {}

    public static function instance(): WixInstanceService
    {
        return self::$wixInstanceService;
    }

    public static function site(): WixSiteService
    {
        return self::$wixSiteService;
    }

    public static function product(): WixProductService
    {
        return self::$wixProductService;
    }

    public static function variant(): WixVariantService
    {
        return self::$wixVariantService;
    }

    public static function auth(): WixAuthService
    {
        return self::$wixAuthService;
    }

    public static function app(): WixAppService
    {
        return self::$wixAppService;
    }

    public static function collection(): WixCollectionService
    {
        return self::$wixCollectionService;
    }

    public static function inventory(): WixInventoryService
    {
        return self::$wixInventoryService;
    }
}
