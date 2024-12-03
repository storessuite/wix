<?php

namespace StoresSuite\Wix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WixInventoryVariant extends Model
{
    protected $fillable = [
        'wix_inventory_id',
        'variantId',
        'inStock',
        'quantity',
        'availableForPreorder'
    ];

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(WixInventory::class);
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(WixSite::class);
    }
}
