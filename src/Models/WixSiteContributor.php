<?php

namespace StoresSuite\Wix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class WixSiteContributor extends Model
{
    protected $fillable = [
        '_id',
        'metaData_id',
        'metaData_fullName',
        'metaData_imageUrl',
        'metaData_email',
        'isTeam',
        'joinedAt',
        'invitedEmail',
        'isClient',
    ];

    public function assignments()
    {
        return $this->hasMany(WixAssignment::class);
    }

    public function sites(): BelongsToMany
    {
        return $this->belongsToMany(WixSite::class, 'wix_site_wix_site_contributor', 'wix_site_contributor_id', 'wix_site_id');
    }
}
