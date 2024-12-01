<?php

namespace StoresSuite\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WixMedia extends Model
{
    protected $table = 'wix_media';

    protected $fillable = [
        '_id',
        'thumbnail_url',
        'thumbnail_width',
        'thumbnail_height',
        'thumbnail_format',
        'thumbnail_altText',
        'mediaType',
        'title',
        'image_url',
        'image_width',
        'image_height',
        'image_format',
        'image_altText',
        'video_stillFrameMediaId',
    ];

    public function videoFiles(): HasMany
    {
        return $this->hasMany(WixVideoFile::class);
    }

    public function choices(): BelongsToMany
    {
        return $this->belongsToMany(WixChoice::class, 'wix_choice_wix_media', 'wix_media_id', 'wix_choice_id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(WixProduct::class, 'wix_media_wix_product', 'wix_media_id', 'wix_product_id');
    }

    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(WixCollection::class, 'wix_collection_wix_media', 'wix_media_id', 'wix_collection_id');
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(WixSite::class);
    }
}
