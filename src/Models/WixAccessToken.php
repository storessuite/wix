<?php

namespace StoresSuite\Wix\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use function Symfony\Component\Clock\now;

class WixAccessToken extends Model
{
    protected $fillable = [
        'wix_site_id',
        'access_token',
        'token_type',
        'expires_in',
        'expires_at'
    ];

    public function site(): BelongsTo
    {
        return $this->belongsTo(WixSite::class);
    }

    public function isValidFor(int $minutes): bool
    {
        return Carbon::parse($this->expires_at)->gte(Carbon::now()->addMinutes($minutes));
    }
}
