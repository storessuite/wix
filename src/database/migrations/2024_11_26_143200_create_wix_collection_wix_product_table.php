<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use StoresSuite\Wix\Models\WixCollection;
use StoresSuite\Wix\Models\WixProduct;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wix_collection_wix_product', function (Blueprint $table) {
            $table->foreignIdFor(WixCollection::class);
            $table->foreignIdFor(WixProduct::class);
            $table->foreign('wix_collection_id')->references('id')->on('wix_collections');
            $table->foreign('wix_product_id')->references('id')->on('wix_products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_collection_wix_product');
    }
};
