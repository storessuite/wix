<?php

namespace StoresSuite\Wix\Contracts;

use StoresSuite\Wix\Models\WixSite;

interface WixContract {
    /**
     * Handle installation
     * 
     * @param WixSite $wixSite
     */
    public function handleInstallation(WixSite $wixSite): bool;
}
