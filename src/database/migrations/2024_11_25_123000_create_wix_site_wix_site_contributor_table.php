<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use StoresSuite\Models\WixSite;
use StoresSuite\Models\WixSiteContributor;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wix_site_wix_site_contributor', function (Blueprint $table) {
            $table->foreignIdFor(WixSite::class);
            $table->foreignIdFor(WixSiteContributor::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_site_wix_site_contributor');
    }
};
