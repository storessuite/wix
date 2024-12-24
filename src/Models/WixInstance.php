<?php

namespace StoresSuite\Wix\Models;

use Illuminate\Database\Eloquent\Model;

class WixInstance extends Model
{
    protected $fillable = [
        'instance_instanceId',
        'instance_appName',
        'instance_appVersion',
        'instance_isFree',
        'instance_billing_packageName',
        'instance_billing_billingCycle',
        'instance_billing_timeStamp',
        'instance_billing_expirationDate',
        'instance_billing_autoRenewing',
        'instance_billing_invoiceId',
        'instance_billing_source',
        'instance_billing_freeTrialInfo_status',
        'instance_billing_freeTrialInfo_endDate',
        'instance_originInstanceId',
        'instance_isOriginSiteTemplate',
        'instance_copiedFromTemplate',
        'instance_freeTrialAvailable',
        'site_siteDisplayName',
        'site_locale',
        'site_paymentCurrency',
        'site_multilingual_isMultiLingual',
        'site_url',
        'site_description',
        'site_ownerEmail',
        'site_ownerInfo_email',
        'site_ownerInfo_emailStatus',
        'site_siteId',
    ];

    public function extractSite(): array
    {
        return [
            '_id' => $this->site_siteId,
            'displayName' => $this->site_siteDisplayName,
        ];
    }
}
