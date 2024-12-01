<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use StoresSuite\Models\WixProduct;
use StoresSuite\Models\WixSite;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wix_variants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(WixSite::class);
            $table->foreignIdFor(WixProduct::class);
            $table->uuid('_id');
            $table->string('variant_priceData_currency')->nullable();
            $table->decimal('variant_priceData_price')->nullable();
            $table->decimal('variant_priceData_discountedPrice')->nullable();
            $table->string('variant_priceData_formatted_price')->nullable();
            $table->string('variant_priceData_formatted_discountedPrice')->nullable();
            $table->string('variant_priceData_formatted_pricePerUnit')->nullable();
            $table->decimal('variant_priceData_pricePerUnit')->nullable();
            $table->string('variant.convertedPriceData_currency')->nullable();
            $table->decimal('variant.convertedPriceData_price')->nullable();
            $table->decimal('variant.convertedPriceData_discountedPrice')->nullable();
            $table->string('variant.convertedPriceData_formatted_price')->nullable();
            $table->string('variant.convertedPriceData_formatted_discountedPrice')->nullable();
            $table->string('variant.convertedPriceData_formatted_pricePerUnit')->nullable();
            $table->decimal('variant.priceRange_minValue')->nullable();
            $table->decimal('variant.priceRange_maxValue')->nullable();
            $table->decimal('variant.costAndProfitData_itemCost')->nullable();
            $table->string('variant.costAndProfitData_formattedItemCost')->nullable();
            $table->decimal('variant.costAndProfitData_profit')->nullable();
            $table->string('variant.costAndProfitData_formattedProfit')->nullable();
            $table->decimal('variant.costAndProfitData_profitMargin')->nullable();
            $table->decimal('variant.weight')->nullable();
            $table->string('variant.sku')->nullable();
            $table->boolean('variant.visible')->nullable();
            $table->boolean('stock_trackQuantity')->nullable();
            $table->integer('stock_quantity')->nullable();
            $table->boolean('stock_inStock')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_variants');
    }
};
