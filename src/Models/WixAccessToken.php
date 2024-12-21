<?php

namespace StoresSuite\Wix\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Crypt;
use StoresSuite\Wix\Enums\AccessTokenValidity;

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

    /**
     * Check if access token is still valid
     *
     * @param AccessTokenValidity $validity
     * @return bool
     */
    public function isValidFor(AccessTokenValidity $validity): bool
    {
        return Carbon::parse($this->expires_at)->gte(Carbon::now()->addMinutes($validity->value));
    }

    /**
     * Decrypt and return token
     * 
     * @return string
     */
    public function token(): string
    {
        return Crypt::decrypt($this->access_token);
    }
}
