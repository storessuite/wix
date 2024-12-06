<?php

namespace StoresSuite\Wix\Services\Traits;

trait ProductResponseParser
{
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
        'stock_inventoryStatus' => 'stock.inventoryStatus',
        'price_currency' => 'price.currency',
        'price_price' => 'price.price',
        'price_discountedPrice' => 'price.discountedPrice',
        'price_formatted_price' => 'price.formatted.price',
        'price_formatted_discountedPrice' => 'price.formatted.discountedPrice',
        'price_formatted_pricePerUnit' => 'price.formatted.pricePerUnit',
        'convertedPriceData_currency' => 'convertedPriceData.currency',
        'convertedPriceData_price' => 'convertedPriceData.price',
        'convertedPriceData_discountedPrice' => 'convertedPriceData.discountedPrice',
        'convertedPriceData_formatted_price' => 'convertedPriceData.formatted.price',
        'convertedPriceData_formatted_discountedPrice' => 'convertedPriceData.formatted.discountedPrice',
        'convertedPriceData_formatted_pricePerUnit' => 'convertedPriceData.formatted.pricePerUnit',
        'priceRange_minValue' => 'priceRange.minValue',
        'priceRange_maxValue' => 'priceRange.maxValue',
        'costAndProfitData_itemCost' => 'costAndProfitData.itemCost',
        'costAndProfitData_formattedItemCost' => 'costAndProfitData.formattedItemCost',
        'costAndProfitData_profit' => 'costAndProfitData.profit',
        'costAndProfitData_formattedProfit' => 'costAndProfitData.formattedProfit',
        'costAndProfitData_profitMargin' => 'costAndProfitData.profitMargin',
        'costRange_minValue' => 'costRange.minValue',
        'costRange_maxValue' => 'costRange.minValue',
        'pricePerUnitData_totalQuantity' => 'pricePerUnitData.totalQuantity',
        'pricePerUnitData_totalMeasurementUnit' => 'pricePerUnitData.totalMeasurementUnit',
        'pricePerUnitData_baseQuantity' => 'pricePerUnitData.baseQuantity',
        'pricePerUnitData_baseMeasurementUnit' => 'pricePerUnitData.baseMeasurementUnit',
        'media_mainMedia_thumbnail_url' => 'media.mainMedia.thumbnail.url',
        'media_mainMedia_thumbnail_width' => 'media.mainMedia.thumbnail.width',
        'media_mainMedia_thumbnail_height' => 'media.mainMedia.thumbnail.height',
        'media_mainMedia_thumbnail_format' => 'media.mainMedia.thumbnail.format',
        'media_mainMedia_thumbnail_altText' => 'media.mainMedia.thumbnail.altText',
        'media_mainMedia_mediaType' => 'media.mainMedia.mediaType',
        'media_mainMedia_title' => 'media.mainMedia.title',
        'media_mainMedia_id' => 'media.mainMedia.id',
        'media_mainMedia_image_url' => 'media.mainMedia.image.url',
        'media_mainMedia_image_width' => 'media.mainMedia.image.width',
        'media_mainMedia_image_height' => 'media.mainMedia.image.height',
        'media_mainMedia_image_format' => 'media.mainMedia.image.format',
        'media_mainMedia_image_altText' => 'media.mainMedia.image.altText',
        'media_mainMedia_video_stillFrameMediaId' => 'media.mainMedia.video.stillFrameMediaId',
        'manageVariants' => 'manageVariants',
        'productPageUrl_base' => 'productPageUrl.base',
        'productPageUrl_path' => 'productPageUrl.path',
        'numericId' => 'numericId',
        'inventoryItemId' => 'inventoryItemId',
        'discount_type' => 'discount.type',
        'discount_value' => 'discount.value',
        'lastUpdated' => 'lastUpdated',
        'createdDate' => 'createdDate',
        'seoData_settings_preventAutoRedirect' => 'seoData.settings.preventAutoRedirect',
        'ribbon' => 'ribbon',
        'brand' => 'brand',
    ];

    public function parseProduct(array $productData)
    {
        $parsedData = [];

        foreach ($this->keyMapping as $key => $value) {
            $parsedData[$key] = data_get($productData, $value);
        }

        return $parsedData;
    }
}
