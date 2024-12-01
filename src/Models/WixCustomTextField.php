<?php

namespace StoresSuite\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WixCustomTextField extends Model
{
    protected $fillable = [
        'wix_product_id',
        'title',
        'maxLength',
        'mandatory'
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
