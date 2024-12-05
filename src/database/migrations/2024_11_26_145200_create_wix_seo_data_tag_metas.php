<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use StoresSuite\Wix\Models\WixSeoDataTag;
use StoresSuite\Wix\Models\WixSite;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wix_seo_tag_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(WixSite::class);
            $table->foreignIdFor(WixSeoDataTag::class);
            $table->string('key')->nullable();
            $table->string('value')->nullable();
            $table->timestamps();
            $table->foreign('wix_site_id')->references('id')->on('wix_sites');
            $table->foreign('wix_seo_data_tag_id')->references('id')->on('wix_seo_data_tags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_seo_tag_metas');
    }
};
