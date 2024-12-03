<?php

namespace StoresSuite\Wix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WixCollection extends Model
{
    protected $fillable = [
        '_id',
        'name',
        'media_mainMedia_thumbnail_url',
        'media_mainMedia_thumbnail_width',
        'media_mainMedia_thumbnail_height',
        'media_mainMedia_thumbnail_format',
        'media_mainMedia_thumbnail_altText',
        'media_mainMedia_mediaType',
        'media_mainMedia_title',
        'media_mainMedia_id',
        'media_mainMedia_image_url',
        'media_mainMedia_image_width',
        'media_mainMedia_image_height',
        'media_mainMedia_image_format',
        'media_mainMedia_image_altText',
        'media_mainMedia_video_stillFrameMediaId',
        'numberOfProducts',
        'description',
        'slug',
        'visible',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(WixProduct::class, 'wix_collection_wix_product', 'wix_collection_id', 'wix_product_id');
    }

    public function media(): BelongsToMany
    {
        return $this->belongsToMany(WixMedia::class, 'wix_collection_wix_media', 'wix_collection_id', 'wix_media_id');
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(WixSite::class);
    }
}
