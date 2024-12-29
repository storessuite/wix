<?php

namespace StoresSuite\Wix\Traits;

use Illuminate\Support\Facades\Config;
use StoresSuite\Wix\Exceptions\WixException;

trait ParsesInstance
{
    public function extractInstanceId(string $instance): string
    {
        $appSecret = Config::get('wix.client_secret');
        list($code, $data) = explode('.', $instance);

        if (base64_decode(strtr($code, "-_", "+/")) != hash_hmac("sha256", $data, $appSecret, TRUE)) {
            throw new WixException('Invalid instance');
        }

        if (($json = json_decode(base64_decode($data), true)) === null) {
            throw new WixException('Invalid instance.');
        }

        return $json['instanceId'];
    }
}
