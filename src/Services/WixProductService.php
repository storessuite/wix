<?php

namespace StoresSuite\Wix\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Crypt;
use StoresSuite\Wix\Models\WixProduct;
use StoresSuite\Wix\Models\WixSite;
use StoresSuite\Wix\Services\Traits\ProductResponseParser;
use StoresSuite\Wix\WixApi\V1\Catalog;

class WixProductService
{
    use ProductResponseParser;

    public function fetchOne(WixSite $wixSite, WixProduct $wixProduct): WixProduct
    {
        $sourceWixProduct = (new Catalog())->getProduct(Crypt::decrypt($wixSite->accessToken->access_token), $wixProduct->_id);
        $parsedData = $this->parseProduct($sourceWixProduct['product']);
        return $this->create($parsedData);
    }

    public function fetchAll(WixSite $wixSite, Collection $wixProducts = null): Collection
    {
        $apiResponse = (new Catalog())
            ->when($wixProducts, function (Catalog $catalog) use ($wixProducts) {
                $catalog->idIn($wixProducts->pluck('_id')->toArray());
            })
            ->queryProducts(Crypt::decrypt($wixSite->accessToken->access_token));

        $wixProducts = new Collection();
        foreach ($apiResponse['products'] as $sourceWixProduct) {
            $parsedData = $this->parseProduct($sourceWixProduct);
            $wixProduct = $this->create($parsedData);
            $wixProducts->push($wixProduct);
        }

        return $wixProducts;
    }

    public function fetchNew(WixSite $wixSite): Collection {}

    public function fetchUpdated(WixSite $wixSite): Collection {}

    public function create(array $wixProductDetails): WixProduct
    {
        return WixProduct::query()->create($wixProductDetails);
    }

    public function delete(WixProduct $wixProduct): bool {}
}
