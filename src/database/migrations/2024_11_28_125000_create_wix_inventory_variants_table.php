<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use StoresSuite\Wix\Models\WixInventory;
use StoresSuite\Wix\Models\WixSite;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wix_inventory_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(WixSite::class);
            $table->foreignIdFor(WixInventory::class);
            $table->string('variantId');
            $table->boolean('inStock')->nullable();
            $table->integer('quantity')->nullable();
            $table->boolean('availableForPreorder')->nullable();
            $table->timestamps();
            $table->foreign('wix_site_id')->references('id')->on('wix_sites');
            $table->foreign('wix_inventory_id')->references('id')->on('wix_inventories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_inventory_variants');
    }
};
