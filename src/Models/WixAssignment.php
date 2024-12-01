<?php

namespace StoresSuite\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WixAssignment extends Model
{
    protected $fillable = [
        'wix_site_contributor_id',
        '_id',
        'policy_policyId',
        'policy_title',
        'policy_description',
        'subject_id',
        'subject_subjectType',
        'subject_context_id',
        'subject_context_contextType',
    ];

    public function siteContributor(): BelongsTo
    {
        return $this->belongsTo(WixSiteContributor::class);
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(WixSite::class);
    }
}
