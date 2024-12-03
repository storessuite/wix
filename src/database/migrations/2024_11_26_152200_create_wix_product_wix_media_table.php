<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use StoresSuite\Wix\Models\WixMedia;
use StoresSuite\Wix\Models\WixProduct;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wix_media_wix_product', function (Blueprint $table) {
            $table->foreignIdFor(WixProduct::class);
            $table->foreignIdFor(WixMedia::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_media_wix_product');
    }
};
