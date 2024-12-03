<?php

namespace StoresSuite\Wix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WixChoice extends Model
{
    protected $fillable = [
        'wix_product_id',
        'value',
        'description',
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
        'inStock',
        'visible',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(WixProduct::class);
    }

    public function variants(): BelongsToMany
    {
        return $this->belongsToMany(WixVariant::class, 'wix_choice_wix_variant', 'wix_choice_id', 'wix_variant_id');
    }

    public function media(): BelongsToMany
    {
        return $this->belongsToMany(WixMedia::class, 'wix_choice_wix_media', 'wix_choice_id', 'wix_media_id');
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(WixSite::class);
    }
}
