<?php

namespace StoresSuite\Wix\Contracts;

use StoresSuite\Wix\Models\WixSite;

interface Bridge
{
    /**
     * Custom logic after installation is complete
     *
     * @param WixSite
     * @param string $state
     * @return mixed
     */
    public function handleInstallation(WixSite $wixSite, string $state): mixed;
}
