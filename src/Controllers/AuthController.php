<?php

namespace StoresSuite\Wix\Controllers;

use Illuminate\Bus\Dispatcher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use StoresSuite\Wix\Jobs\FetchSite;
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
     * @return RedirectResponse
     */
    public function redirect(Request $request, Wix $wix): RedirectResponse
    {
        [$wixRefreshToken, $wixAccessToken] = $wix->auth()->generateToken($request->code);
        $wixInstance = $wix->instance()->fetchUsingToken($wixAccessToken);
        $wixSite = $wixInstance->extractSite();
        $wixRefreshToken->setOwner($wixSite);
        $wixAccessToken->setOwner($wixSite);

        App::make(Dispatcher::class)
            ->batch([
                new FetchSite($wixSite)
            ])
            ->onQueue('wix')
            ->dispatch();

        if ($request->state) {
            return Redirect::to(Config::get('wix.complete_url') . '?state=' . $request->state . '&wixSiteId=' . $wixSite->id);
        }

        return $wix->app()->closeWindow($wixAccessToken);
    }
}
