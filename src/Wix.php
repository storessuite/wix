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

    public function instance(): WixInstanceService
    {
        return $this->wixInstanceService;
    }

    public function site(): WixSiteService
    {
        return $this->wixSiteService;
    }

    public function product(): WixProductService
    {
        return $this->wixProductService;
    }

    public function variant(): WixVariantService
    {
        return $this->wixVariantService;
    }

    public function auth(): WixAuthService
    {
        return $this->wixAuthService;
    }

    public function app(): WixAppService
    {
        return $this->wixAppService;
    }

    public function collection(): WixCollectionService
    {
        return $this->wixCollectionService;
    }

    public function inventory(): WixInventoryService
    {
        return $this->wixInventoryService;
    }
}
