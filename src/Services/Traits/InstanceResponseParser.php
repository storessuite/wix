<?php

namespace StoresSuite\Wix\Services\Traits;

trait InstanceResponseParser
{
    public $keyMapping = [
        'instance_instanceId' => 'instance.instanceId',
        'instance_appName' => 'instance.appName',
        'instance_appVersion' => 'instance.appVersion',
        'instance_isFree' => 'instance.isFree',
        'instance_billing_packageName' => 'instance.billing.packageName',
        'instance_billing_billingCycle' => 'instance.billing.billingCycle',
        'instance_billing_timeStamp' => 'instance.billing.timeStamp',
        'instance_billing_expirationDate' => 'instance.billing.expirationDate',
        'instance_billing_autoRenewing' => 'instance.billing.autoRenewing',
        'instance_billing_invoiceId' => 'instance.billing.invoiceId',
        'instance_billing_source' => 'instance.billing.source',
        'instance_billing_freeTrialInfo_status' => 'instance.billing.freeTrialInfo.status',
        'instance_billing_freeTrialInfo_endDate' => 'instance.billing.freeTrialInfo.endDate',
        'instance_originInstanceId' => 'instance.originInstanceId',
        'instance_isOriginSiteTemplate' => 'instance.isOriginSiteTemplate',
        'instance_copiedFromTemplate' => 'instance.copiedFromTemplate',
        'instance_freeTrialAvailable' => 'instance.freeTrialAvailable',
        'site_siteDisplayName' => 'site.siteDisplayName',
        'site_locale' => 'site.locale',
        'site_paymentCurrency' => 'site.paymentCurrency',
        'site_multilingual_isMultiLingual' => 'site.multilingual.isMultiLingual',
        'site_url' => 'site.url',
        'site_description' => 'site.description',
        'site_ownerEmail' => 'site.ownerEmail',
        'site_ownerInfo_email' => 'site.ownerInfo_email',
        'site_ownerInfo_emailStatus' => 'site.ownerInfo.emailStatus',
        'site_siteId' => 'site.siteId',
    ];

    public function parseInstance(array $instanceData): array
    {
        $parsedData = [];

        foreach ($this->keyMapping as $key => $value) {
            $parsedData[$key] = data_get($instanceData, $value);
        }

        return $parsedData;
    }
}
