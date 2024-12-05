<?php

namespace StoresSuite\Wix;

use StoresSuite\Wix\Services\WixProductService;
use StoresSuite\Wix\Services\WixSiteService;

class Wix
{
    private $wixSiteService;
    private $wixProductService;

    public function __construct() {}

    public function site(): Wix
    {
        if (!$this->wixSiteService)
            $this->wixSiteService = new WixSiteService();

        return $this->wixSiteService;
    }

    public function product(): Wix
    {
        if (!$this->wixProductService)
            $this->wixProductService = new WixProductService();

        return $this->wixProductService;
    }
}
