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
        Schema::create('wix_custom_text_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(WixSite::class);
            $table->foreignIdFor(WixProduct::class);
            $table->string('title')->nullable();
            $table->integer('maxLength')->nullable();
            $table->boolean('mandatory')->nullable();
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
        Schema::dropIfExists('wix_custom_text_fields');
    }
};
