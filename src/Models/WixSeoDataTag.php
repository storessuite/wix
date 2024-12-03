<?php

namespace StoresSuite\Wix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WixSeoDataTag extends Model
{
    protected $fillable = [
        'wix_product_id',
        'type',
        'children',
        'custom',
        'disabled'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(WixProduct::class);
    }

    public function setoDataTagMeta(): HasMany
    {
        return $this->hasMany(WixSeoDataTagMeta::class);
    }

    public function setoDataTagProps(): HasMany
    {
        return $this->hasMany(WixSeoDataTagProp::class);
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(WixSite::class);
    }
}
