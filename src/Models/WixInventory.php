<?php

namespace StoresSuite\Wix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WixInventory extends Model
{
    protected $fillable = [
        'wix_product_id',
        '_id',
        'externalId',
        'productId',
        'trackQuantity',
        'lastUpdated',
        'numericId',
        'preorderInfo_enabled',
        'preorderInfo_message',
        'preorderInfo_limit',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(WixProduct::class);
    }

    public function inventoryVariants(): HasMany
    {
        return $this->hasMany(WixInventoryVariant::class);
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(WixSite::class);
    }
}
