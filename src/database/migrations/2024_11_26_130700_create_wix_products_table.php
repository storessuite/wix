<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use StoresSuite\Models\WixSite;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wix_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(WixSite::class);
            $table->uuid('_id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('visible')->nullable();
            $table->string('productType')->nullable();
            $table->text('description')->nullable();
            $table->string('sku')->nullable();
            $table->decimal('weight')->nullable();
            $table->decimal('weightRange_minValue')->nullable();
            $table->decimal('weightRange_maxValue')->nullable();
            $table->boolean('stock_trackInventory')->nullable();
            $table->integer('stock_quantity')->nullable();
            $table->boolean('stock_inStock')->nullable();
            $table->string('stock_inventoryStatus')->nullable();
            $table->string('price_currency')->nullable();
            $table->decimal('price_price')->nullable();
            $table->decimal('price_discountedPrice')->nullable();
            $table->string('price_formatted_price')->nullable();
            $table->string('price_formatted_discountedPrice')->nullable();
            $table->string('price_formatted_pricePerUnit')->nullable();
            $table->decimal('price_pricePerUnit')->nullable();
            $table->string('priceData_currency')->nullable();
            $table->decimal('priceData_price')->nullable();
            $table->decimal('priceData_discountedPrice')->nullable();
            $table->string('priceData_formatted_price')->nullable();
            $table->string('priceData_formatted_discountedPrice')->nullable();
            $table->string('priceData_formatted_pricePerUnit')->nullable();
            $table->string('convertedPriceData_currency')->nullable();
            $table->decimal('convertedPriceData_price')->nullable();
            $table->decimal('convertedPriceData_discountedPrice')->nullable();
            $table->string('convertedPriceData_formatted_price')->nullable();
            $table->string('convertedPriceData_formatted_discountedPrice')->nullable();
            $table->string('convertedPriceData_formatted_pricePerUnit')->nullable();
            $table->decimal('priceRange_minValue')->nullable();
            $table->decimal('priceRange_maxValue')->nullable();
            $table->decimal('costAndProfitData_itemCost')->nullable();
            $table->string('costAndProfitData_formattedItemCost')->nullable();
            $table->decimal('costAndProfitData_profit')->nullable();
            $table->string('costAndProfitData_formattedProfit')->nullable();
            $table->decimal('costAndProfitData_profitMargin')->nullable();
            $table->decimal('costRange_minValue')->nullable();
            $table->decimal('costRange_maxValue')->nullable();
            $table->decimal('pricePerUnitData_totalQuantity')->nullable();
            $table->string('pricePerUnitData_totalMeasurementUnit')->nullable();
            $table->decimal('pricePerUnitData_baseQuantity')->nullable();
            $table->string('pricePerUnitData_baseMeasurementUnit')->nullable();
            $table->string('media_mainMedia_thumbnail_url')->nullable();
            $table->integer('media_mainMedia_thumbnail_width')->nullable();
            $table->integer('media_mainMedia_thumbnail_height')->nullable();
            $table->string('media_mainMedia_thumbnail_format')->nullable();
            $table->string('media_mainMedia_thumbnail_altText')->nullable();
            $table->string('media_mainMedia_mediaType')->nullable();
            $table->string('media_mainMedia_title')->nullable();
            $table->string('media_mainMedia_id')->nullable();
            $table->string('media_mainMedia_image_url')->nullable();
            $table->integer('media_mainMedia_image_width')->nullable();
            $table->integer('media_mainMedia_image_height')->nullable();
            $table->string('media_mainMedia_image_format')->nullable();
            $table->string('media_mainMedia_image_altText')->nullable();
            $table->string('media_mainMedia_video_stillFrameMediaId')->nullable();
            $table->boolean('manageVariants')->nullable();
            $table->string('productPageUrl_base')->nullable();
            $table->string('productPageUrl_path')->nullable();
            $table->bigInteger('numericId')->nullable();
            $table->string('inventoryItemId')->nullable();
            $table->string('discount_type')->nullable();
            $table->decimal('discount_value')->nullable();
            $table->string('lastUpdated')->nullable();
            $table->string('createdDate')->nullable();
            $table->boolean('seoData_settings_preventAutoRedirect')->nullable();
            $table->string('ribbon')->nullable();
            $table->string('brand')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_products');
    }
};
