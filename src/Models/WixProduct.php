<?php

namespace StoresSuite\Wix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WixProduct extends Model
{
    protected $fillable = [
        '_id',
        'wix_site_id',
        'name',
        'slug',
        'visible',
        'productType',
        'description',
        'sku',
        'weight',
        'weightRange_minValue',
        'weightRange_maxValue',
        'stock_trackInventory',
        'stock_quantity',
        'stock_inStock',
        'stock_inventoryStatus',
        'price_currency',
        'price_price',
        'price_discountedPrice',
        'price_formatted_price',
        'price_formatted_discountedPrice',
        'price_formatted_pricePerUnit',
        'price_pricePerUnit',
        'priceData_currency',
        'priceData_price',
        'priceData_discountedPrice',
        'priceData_formatted_price',
        'priceData_formatted_discountedPrice',
        'priceData_formatted_pricePerUnit',
        'convertedPriceData_currency',
        'convertedPriceData_price',
        'convertedPriceData_discountedPrice',
        'convertedPriceData_formatted_price',
        'convertedPriceData_formatted_discountedPrice',
        'convertedPriceData_formatted_pricePerUnit',
        'priceRange_minValue',
        'priceRange_maxValue',
        'costAndProfitData_itemCost',
        'costAndProfitData_formattedItemCost',
        'costAndProfitData_profit',
        'costAndProfitData_formattedProfit',
        'costAndProfitData_profitMargin',
        'costRange_minValue',
        'costRange_maxValue',
        'pricePerUnitData_totalQuantity',
        'pricePerUnitData_totalMeasurementUnit',
        'pricePerUnitData_baseQuantity',
        'pricePerUnitData_baseMeasurementUnit',
        'media_mainMedia_thumbnail_url',
        'media_mainMedia_thumbnail_width',
        'media_mainMedia_thumbnail_height',
        'media_mainMedia_thumbnail_format',
        'media_mainMedia_thumbnail_altText',
        'media_mainMedia_mediaType',
        'media_mainMedia_title',
        'media_mainMedia_id',
        'media_mainMedia_image_url',
        'media_mainMedia_image_width',
        'media_mainMedia_image_height',
        'media_mainMedia_image_format',
        'media_mainMedia_image_altText',
        'media_mainMedia_video_stillFrameMediaId',
        'manageVariants',
        'productPageUrl_base',
        'productPageUrl_path',
        'numericId',
        'inventoryItemId',
        'discount_type',
        'discount_value',
        'lastUpdated',
        'createdDate',
        'seoData_settings_preventAutoRedirect',
        'ribbon',
        'brand',
    ];

    public function additionalInfo(): HasMany
    {
        return $this->hasMany(WixAdditionalInfo::class);
    }

    public function choices(): HasMany
    {
        return $this->hasMany(WixChoice::class);
    }

    public function customTextFields(): HasMany
    {
        return $this->hasMany(WixCustomTextField::class);
    }

    public function productOptions(): HasMany
    {
        return $this->hasMany(WixProductOption::class);
    }

    public function ribbons(): HasMany
    {
        return $this->hasMany(WixRibbon::class);
    }

    public function seoKeywords(): HasMany
    {
        return $this->hasMany(WixSeoDataKeyword::class);
    }

    public function seoTags(): HasMany
    {
        return $this->hasMany(WixSeoDataTag::class);
    }

    public function variants(): HasMany
    {
        return $this->hasMany(WixVariant::class);
    }

    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(WixCollection::class, 'wix_collection_wix_product', 'wix_product_id', 'wix_collection_id');
    }

    public function media(): BelongsToMany
    {
        return $this->belongsToMany(WixMedia::class, 'wix_media_wix_product', 'wix_product_id', 'wix_media_id');
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(WixSite::class);
    }
}
