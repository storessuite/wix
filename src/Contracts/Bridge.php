<?php

namespace StoresSuite\Wix\Contracts;

use StoresSuite\Wix\Models\WixSite;

interface Bridge
{
    /**
     * Custom logic after installation is complete
     *
     * @param WixSite
     * @return mixed
     */
    public function handleInstallation(WixSite $wixSite): mixed;
}
