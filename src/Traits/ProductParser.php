<?php

namespace StoresSuite\Wix\Traits;

use StoresSuite\Wix\Models\WixProduct;

trait ProductParser {

    public $keyMapping = [
        '_id' => 'id',
        'name' => 'name',
        'slug' => 'slug',
        'visible' => 'visible',
        'productType' => 'productType',
        'description' => 'description',
        'sku' => 'sku',
        'weight' => 'weight',
        'weightRange_minValue' => 'weightRange.minValue',
        'weightRange_maxValue' => 'weightRange.maxValue',
        'stock_trackInventory' => 'stock.trackInventory',
        'stock_quantity' => 'stock.quantity',
        'stock_inStock' => 'stock.inStock',
        'stock_inventoryStatus' => 'stock.inventoryStatus'
    ];

    public function parseProduct(array $productData){
        WixProduct::updateOrCreate([
            '_id' => $productData['id'],
            'name' => $productData['name'],
            'slug' => $productData['slug'],
        ]);
    }
}
