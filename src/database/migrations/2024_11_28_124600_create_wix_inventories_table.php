<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use StoresSuite\Wix\Models\WixProduct;
use StoresSuite\Wix\Models\WixSite;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wix_inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(WixSite::class);
            $table->foreignIdFor(WixProduct::class);
            $table->uuid('_id');
            $table->string('externalId')->nullable();
            $table->string('productId')->nullable();
            $table->boolean('trackQuantity')->nullable();
            $table->string('lastUpdated')->nullable();
            $table->unsignedBigInteger('numericId')->nullable();
            $table->boolean('preorderInfo_enabled')->nullable();
            $table->string('preorderInfo_message')->nullable();
            $table->unsignedInteger('preorderInfo_limit')->nullable();
            $table->timestamps();
            $table->foreign('wix_site_id')->references('id')->on('wix_sites');
            $table->foreign('wix_product_id')->references('id')->on('wix_products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_inventories');
    }
};
