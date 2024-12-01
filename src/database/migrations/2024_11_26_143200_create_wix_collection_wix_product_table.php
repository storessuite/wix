<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use StoresSuite\Models\WixCollection;
use StoresSuite\Models\WixProduct;

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
