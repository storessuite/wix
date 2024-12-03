<?php

namespace StoresSuite;

use Illuminate\Support\Facades\Crypt;
use StoresSuite\Models\WixAccessToken;
use StoresSuite\Models\WixProduct;
use StoresSuite\Models\WixSite;
use StoresSuite\Traits\RefreshesWixAccessToken;
use StoresSuite\WixApi\V1\Catalog;

class WixService
{
    use RefreshesWixAccessToken;

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
     * @param string $_id
     * @return \StoresSuite\WixService
     */
    public function site(string $_id): WixService
    {
        if ($this->wixSite && $this->wixAccessToken) return $this;

       $this->wixSite = WixSite::query()->where('_id', $_id)->firstOrFail();
       $this->wixAccessToken = $this->refreshAccessToken($this->wixSite);

        return $this;
    }

    /**
     * Import product
     * 
     * @param string $_id Wix product ID
     * @return \StoresSuite\Models\WixProduct
     */
    public function importProduct(string $_id): WixProduct
    {
        $apiResponse = $this->catalog->getProduct(Crypt::decrypt($this->wixAccessToken->access_token), $_id);
    }
}
