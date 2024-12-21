<?php

namespace StoresSuite\Wix\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use StoresSuite\Wix\Contracts\Bridge;
use StoresSuite\Wix\Wix;

class AuthController extends Controller
{
    /**
     * App URL handler
     *
     * @param Request $request
     * @param Wix $wix
     * @return RedirectResponse
     */
    public function app(Request $request, Wix $wix): RedirectResponse
    {
        return $wix->app()->redirectToInstallationPage($request->token, $request->state);
    }

    /**
     * Handle redirect after user accepts permissions.
     * This is the final step during installation.
     *
     * @param Request $request
     * @param Wix $wix
     * @param Bridge $bridge
     * @return RedirectResponse
     */
    public function redirect(Request $request, Wix $wix, Bridge $bridge): RedirectResponse
    {
        [$wixRefreshToken, $wixAccessToken] = $wix->auth()->generateToken($request->code);
        $wixInstance = $wix->instance()->fetchUsingToken($wixAccessToken);
        $wixSite = $wixInstance->extractSite();
        $wixRefreshToken->setOwner($wixSite);
        $wixAccessToken->setOwner($wixSite);

        if ($request->state) {
            return $bridge->handleInstallation($wixSite, $request->state);
        }

        return $wix->app()->closeWindow($wixAccessToken);
    }
}
