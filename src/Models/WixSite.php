<?php

namespace StoresSuite\Wix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WixSite extends Model
{
    protected $fillable = [
        '_id',
        'htmlAppId',
        'name',
        'displayName',
        'createdDate',
        'updatedDate',
        'trashedDate',
        'published',
        'premium',
        'viewUrl',
        'editUrl',
        'thumbnail',
        'ownerAccountId',
        'editorType',
        'blocked',
        'folderId',
        'namespace',
        'domainConnected',
    ];

    public function contributors(): BelongsToMany
    {
        return $this->belongsToMany(WixSiteContributor::class, 'wix_site_wix_site_contributor', 'wix_site_id', 'wix_site_contributor_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(WixProduct::class);
    }

    public function additionalInfo(): HasMany
    {
        return $this->hasMany(WixAdditionalInfo::class);
    }

    public function choices(): HasMany
    {
        return $this->hasMany(WixChoice::class);
    }

    public function collections(): HasMany
    {
        return $this->hasMany(WixCollection::class);
    }

    public function customTextFields(): HasMany
    {
        return $this->hasMany(WixCustomTextField::class);
    }

    public function inventories(): HasMany
    {
        return $this->hasMany(WixInventory::class);
    }

    public function inventoryVariants(): HasMany
    {
        return $this->hasMany(WixInventoryVariant::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(WixMedia::class);
    }

    public function productOptions(): HasMany
    {
        return $this->hasMany(WixProductOption::class);
    }

    public function ribbons(): HasMany
    {
        return $this->hasMany(WixRibbon::class);
    }

    public function seoDataKeywords(): HasMany
    {
        return $this->hasMany(WixSeoDataKeyword::class);
    }

    public function seoDataTags(): HasMany
    {
        return $this->hasMany(WixSeoDataTag::class);
    }

    public function seoDataTagMeta(): HasMany
    {
        return $this->hasMany(WixSeoDataTagMeta::class);
    }

    public function variants(): HasMany
    {
        return $this->hasMany(WixVariant::class);
    }

    public function videoFiles(): HasMany
    {
        return $this->hasMany(WixVideoFile::class);
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(WixAssignment::class);
    }

    public function refreshToken(): HasOne
    {
        return $this->hasOne(WixRefreshToken::class);
    }

    public function accessToken(): HasOne
    {
        return $this->hasOne(WixAccessToken::class)->orderBy('expired_at', 'DESC');
    }

    public function accessTokens(): HasMany
    {
        return $this->hasMany(WixAccessToken::class);
    }
}
