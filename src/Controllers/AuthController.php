<?php

namespace StoresSuite\Wix\Controllers;

use Illuminate\Bus\Dispatcher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use StoresSuite\Wix\Contracts\WixContract;
use StoresSuite\Wix\Jobs\FetchCollections;
use StoresSuite\Wix\Jobs\FetchInventories;
use StoresSuite\Wix\Jobs\FetchProducts;
use StoresSuite\Wix\Jobs\FetchPurchaseHistory;
use StoresSuite\Wix\Jobs\FetchSite;
use StoresSuite\Wix\Jobs\FetchSiteProperties;
use StoresSuite\Wix\Jobs\FetchVariants;
use StoresSuite\Wix\Wix;

class AuthController extends Controller
{
    public function __construct(
        private Wix $wix,
        private WixContract $wixContract,
    ) {}

    /**
     * App URL handler
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function app(Request $request): RedirectResponse
    {
        return $this->wix->app()->redirectToInstallationPage($request->token, $request->state);
    }

    /**
     * Handle redirect after user accepts permissions.
     * This is the final step during installation.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function redirect(Request $request): RedirectResponse
    {
        [$wixRefreshToken, $wixAccessToken] = $this->wix->auth()->generateToken($request->code);
        $wixInstance = $this->wix->instance()->fetchUsingToken($wixAccessToken);
        $wixSiteDetails = $wixInstance->extractSite();
        $wixSite = $this->wix->site()->create($wixSiteDetails);
        $wixRefreshToken->setOwner($wixSite);
        $wixAccessToken->setOwner($wixSite);

        App::make(Dispatcher::class)
            ->batch([
                new FetchSite($wixSite),
                new FetchSiteProperties($wixSite),
                new FetchPurchaseHistory($wixSite),
                new FetchCollections($wixSite),
                new FetchProducts($wixSite),
                new FetchVariants($wixSite),
                new FetchInventories($wixSite),
            ])
            ->onQueue('wix')
            ->dispatch();

        if ($request->state) {
            return Redirect::to(Config::get('wix.complete_url') . '?state=' . $request->state . '&wixSiteId=' . $wixSite->id);
        }

        $this->wixContract->handleInstallation($wixSite);
        return $this->wix->app()->closeWindow($wixAccessToken);
    }
}
