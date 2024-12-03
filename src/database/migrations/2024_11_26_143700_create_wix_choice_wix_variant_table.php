<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use StoresSuite\Wix\Models\WixChoice;
use StoresSuite\Wix\Models\WixVariant;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wix_choice_wix_variant', function (Blueprint $table) {
            $table->foreignIdFor(WixChoice::class);
            $table->foreignIdFor(WixVariant::class);
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
