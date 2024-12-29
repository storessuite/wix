<?php

namespace StoresSuite\Wix\Services;

use Illuminate\Support\Facades\Config;
use StoresSuite\Wix\Exceptions\APIException;
use StoresSuite\Wix\Exceptions\WixException;
use StoresSuite\Wix\Models\WixAccessToken;
use StoresSuite\Wix\Models\WixInstance;
use StoresSuite\Wix\Models\WixSite;
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

    public function findByInstanceId(string $instanceId): WixInstance
    {
        return $this->wixInstance->query()->where('instance_instanceId', $instanceId)->first();
    }

    public function relatedSite(WixInstance $wixInstance): WixSite
    {
        return $wixInstance->wixSite;
    }

    public function findByInstance(string $instance): WixInstance
    {
        $appSecret = Config::get('wix.client_secret');
        list($code, $data) = explode('.', $instance);

        if (base64_decode(strtr($code, "-_", "+/")) != hash_hmac("sha256", $data, $appSecret, TRUE)) {
            throw new WixException('Invalid instance');
        }

        if (($json = json_decode(base64_decode($data), true)) === null) {
            throw new WixException('Invalid instance.');
        }

        return $this->findByInstanceId($json['instanceId']);
    }
}
