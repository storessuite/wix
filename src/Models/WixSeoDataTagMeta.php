<?php

namespace StoresSuite\Wix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WixSeoDataTagMeta extends Model
{
    protected $fillable = [
        'wix_seo_data_tag_id',
        'key',
        'value'
    ];

    public function seoDataTag(): BelongsTo
    {
        return $this->belongsTo(WixSeoDataTag::class);
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(WixSite::class);
    }
}
