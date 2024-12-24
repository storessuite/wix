<?php

namespace StoresSuite\Wix\Services;

use StoresSuite\Wix\Exceptions\APIException;
use StoresSuite\Wix\Models\WixAccessToken;
use StoresSuite\Wix\Models\WixInstance;
use StoresSuite\Wix\Services\Traits\InstanceResponseParser;
use StoresSuite\Wix\WixApi\V1\Instance;

class WixInstanceService
{
    use InstanceResponseParser;

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
}
