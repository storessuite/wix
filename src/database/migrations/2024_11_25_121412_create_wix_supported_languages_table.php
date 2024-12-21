<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use StoresSuite\Wix\Models\WixSite;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wix_supported_languages', function (Blueprint $table) {
            $table->id();
            $table->string('languageCode')->nullable();
            $table->string('locale_languageCode')->nullable();
            $table->string('locale_country')->nullable();
            $table->boolean('isPrimary')->nullable();
            $table->string('countryCode')->nullable();
            $table->string('resolutionMethod')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_supported_languages');
    }
};
