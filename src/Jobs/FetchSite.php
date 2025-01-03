<?php

namespace StoresSuite\Wix\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use StoresSuite\Wix\Models\WixSite;
use StoresSuite\Wix\Services\WixSiteService;

class FetchSite implements ShouldQueue
{
    use Batchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private WixSite $wixSite) {}

    /**
     * Execute the job.
     */
    public function handle(WixSiteService $wixSiteService): void
    {
        $wixSiteService->fetch($this->wixSite);
    }
}
