<?php

namespace StoresSuite\Wix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WixVideoFile extends Model
{
    protected $fillable = [
        'wix_media_id',
        'url',
        'width',
        'height',
        'format',
        'altText',
    ];

    public function media(): BelongsTo
    {
        return $this->belongsTo(WixMedia::class);
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(WixSite::class);
    }
}
