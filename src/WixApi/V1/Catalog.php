<?php

namespace StoresSuite\Wix\WixApi\V1;

use Illuminate\Support\Facades\Http;
use StoresSuite\Wix\WixApi\V1\Traits\FiltersProducts;
use StoresSuite\Wix\WixApi\V1\Traits\Paginates;

class Catalog
{
    use FiltersProducts, Paginates;

    /**
     * Get wix product from Wix API
     * Documentation: https://dev.wix.com/docs/rest/business-solutions/stores/catalog/get-product
     * 
     * @param string $accessToken
     * @param string $_id
     * @return array
     */
    public function getProduct(string $accessToken, string $_id)
    {
        $endPoint = 'https://www.wixapis.com/stores-reader/v1/products/' . $_id;
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => $accessToken
        ];

        return Http::withHeaders($headers)->get($endPoint)->json();
    }

    public function queryProducts(string $accessToken): array
    {
        $endPoint = 'https://www.wixapis.com/stores-reader/v1/products/query';
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => $accessToken
        ];

        return Http::withHeaders($headers)->post($endPoint)->json();
    }
}
