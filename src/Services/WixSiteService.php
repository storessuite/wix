<?php

namespace StoresSuite\Wix\Services;

use Illuminate\Database\Eloquent\Builder;
use StoresSuite\Wix\Models\WixSite;
use StoresSuite\Wix\Models\WixSiteProperty;
use StoresSuite\Wix\Traits\ParsesInstance;

class WixSiteService
{
    use ParsesInstance;

    public function __construct(private WixSite $wixSite) {}

    public function create(array $wixSiteDetails): WixSite
    {
        return $this->wixSite->query()->updateOrCreate([
            '_id' => $wixSiteDetails['_id'],
        ], $wixSiteDetails);
    }

    public function fetch(WixSite $wixSite): WixSite {}

    public function fetchProperties(WixSite $wixSite): WixSiteProperty {}

    /**
     * Get wix site based on instance.
     * Instance is attached to query params by Wix when our app is loaded
     * in iframe inside wix dashboard.
     * More details: https://dev.wix.com/docs/build-apps/develop-your-app/access/app-instances/parse-encoded-app-instance-data
     *
     * @param
     * @return
     */
    public function findByInstance(string $instance): WixSite
    {
        $instanceId = $this->extractInstanceId($instance);
        return $this->wixSite->query()
            ->whereHas('instance', function (Builder $instance) use ($instanceId) {
                $instance->where('instance_instanceId', $instanceId);
            })
            ->first();
    }
}
