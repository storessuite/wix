<?php

namespace StoresSuite\Wix\Services;

use StoresSuite\Wix\Exceptions\APIException;
use StoresSuite\Wix\Models\WixAccessToken;
use StoresSuite\Wix\Models\WixInstance;
use StoresSuite\Wix\Services\Traits\InstanceResponseParser;
use StoresSuite\Wix\Traits\ParsesInstance;
use StoresSuite\Wix\WixApi\V1\Instance;

class WixInstanceService
{
    use InstanceResponseParser, ParsesInstance;

    public function __construct(private Instance $instanceApi, private WixInstance $wixInstance) {}

    public function fetchUsingToken(WixAccessToken $wixAccessToken): WixInstance
    {
        $apiResponse = $this->instanceApi->getAppInstance($wixAccessToken->token());

        $apiResponse['instance'] ?? throw new APIException();

        $parsedData = $this->parseInstance($apiResponse);
        return $this->create($parsedData);
    }

    public function create(array $wixInstanceDetails): WixInstance
    {
        return $this->wixInstance->query()->updateOrCreate([
            'instance_instanceId' => $wixInstanceDetails['instance_instanceId'],
        ], $wixInstanceDetails);
    }

    public function findByInstanceId(string $instanceId): WixInstance
    {
        return $this->wixInstance->query()->where('instance_instanceId', $instanceId)->first();
    }

    /**
     * Find wix instance by instance.
     * Instance is attached to query params by Wix when our app is loaded
     * in iframe inside wix dashboard.
     * More details: https://dev.wix.com/docs/build-apps/develop-your-app/access/app-instances/parse-encoded-app-instance-data
     *
     * @param string $instance
     * @return WixInstance
     */
    public function findByInstance(string $instance): WixInstance
    {
        return $this->findByInstanceId($this->extractInstanceId($instance));
    }
}
