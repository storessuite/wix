<?php

namespace StoresSuite\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WixVariant extends Model
{
    protected $fillable = [
        'wix_product_id',
        '_id',
        'variant_priceData_currency',
        'variant_priceData_price',
        'variant_priceData_discountedPrice',
        'variant_priceData_formatted_price',
        'variant_priceData_formatted_discountedPrice',
        'variant_priceData_formatted_pricePerUnit',
        'variant_priceData_pricePerUnit',
        'variant.convertedPriceData_currency',
        'variant.convertedPriceData_price',
        'variant.convertedPriceData_discountedPrice',
        'variant.convertedPriceData_formatted_price',
        'variant.convertedPriceData_formatted_discountedPrice',
        'variant.convertedPriceData_formatted_pricePerUnit',
        'variant.priceRange_minValue',
        'variant.priceRange_maxValue',
        'variant.costAndProfitData_itemCost',
        'variant.costAndProfitData_formattedItemCost',
        'variant.costAndProfitData_profit',
        'variant.costAndProfitData_formattedProfit',
        'variant.costAndProfitData_profitMargin',
        'variant.weight',
        'variant.sku',
        'variant.visible',
        'stock_trackQuantity',
        'stock_quantity',
        'stock_inStock',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(WixProduct::class);
    }

    public function choices(): BelongsToMany
    {
        return $this->belongsToMany(WixChoice::class, 'wix_choice_wix_variant', 'wix_variant_id', 'wix_choice_id');
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(WixSite::class);
    }
}
