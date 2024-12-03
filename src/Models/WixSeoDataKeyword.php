<?php

namespace StoresSuite\Wix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WixSeoDataKeyword extends Model
{
    protected $fillable = [
        'wix_product_id',
        'term',
        'isMain',
        'origin'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(WixProduct::class);
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(WixSite::class);
    }
}
