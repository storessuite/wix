<?php

namespace StoresSuite\Wix;

use Illuminate\Support\Facades\Crypt;
use StoresSuite\Wix\Models\WixAccessToken;
use StoresSuite\Wix\Models\WixProduct;
use StoresSuite\Wix\Models\WixSite;
use StoresSuite\Wix\Traits\ProductParser;
use StoresSuite\Wix\Traits\RefreshesWixAccessToken;
use StoresSuite\Wix\WixApi\V1\Catalog;

class WixService
{
    use RefreshesWixAccessToken, ProductParser;

    private WixSite $wixSite;
    private WixAccessToken $wixAccessToken;
    public Catalog $catalog;

    public function __construct(Catalog $catalog)
    {
        $this->catalog = $catalog;
    }

    /**
     * Set site
     *
     * @param string|WixSite $wixSite
     * @return \StoresSuite\WixService
     */
    public function site(string|WixSite $wixSite): WixService
    {
        if ($this->wixSite && $this->wixAccessToken) return $this;

        if ($wixSite instanceof WixSite) {
            $this->wixSite = $wixSite;
        } else {
            $this->wixSite = WixSite::query()->where('_id', $wixSite)->firstOrFail();
        }

        $this->wixAccessToken = $this->refreshAccessToken($this->wixSite);

        return $this;
    }

    /**
     * Import product
     * 
     * @param string|WixProduct $wixProduct
     * @return void 
     */
    public function importProduct(string|WixProduct $wixProduct): void
    {
        $_id = $wixProduct instanceof WixProduct ? $wixProduct->_id : $wixProduct;
        $apiResponse = $this->catalog->getProduct(Crypt::decrypt($this->wixAccessToken->access_token), $_id);
        $this->parseProduct($apiResponse);
    }
}
