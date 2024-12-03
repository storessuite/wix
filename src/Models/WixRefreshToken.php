<?php

namespace StoresSuite\Wix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WixRefreshToken extends Model
{
    protected $fillable = [
        'wix_site_id',
        'refresh_token'
    ];

    public function site(): BelongsTo
    {
        return $this->belongsTo(WixSite::class);
    }
}
