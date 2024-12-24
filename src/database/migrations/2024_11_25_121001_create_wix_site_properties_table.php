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
        Schema::create('wix_site_properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(WixSite::class);
            $table->string('version')->nullable();
            $table->string('categories_primary')->nullable();
            $table->string('categories_secondary')->nullable();
            $table->string('categories_businessTermId')->nullable();
            $table->string('locale_languageCode')->nullable();
            $table->string('locale_country')->nullable();
            $table->string('language')->nullable();
            $table->string('paymentCurrency')->nullable();
            $table->string('timeZone')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('address_street')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_country')->nullable();
            $table->string('address_state')->nullable();
            $table->string('address_zip')->nullable();
            $table->string('address_hint_text')->nullable();
            $table->string('address_hint_placement')->nullable();
            $table->boolean('address_isPhysical')->nullable();
            $table->string('address_googleFormattedAddress')->nullable();
            $table->string('address_streetNumber')->nullable();
            $table->string('address_apartmentNumber')->nullable();
            $table->string('address_coordinates_latitude')->nullable();
            $table->string('address_coordinates_longitude')->nullable();
            $table->string('siteDisplayName')->nullable();
            $table->string('businessName')->nullable();
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->boolean('multilingual_autoRedirect')->nullable();
            $table->boolean('consentPolicy_essential')->nullable();
            $table->boolean('consentPolicy_functional')->nullable();
            $table->boolean('consentPolicy_analytics')->nullable();
            $table->boolean('consentPolicy_advertising')->nullable();
            $table->boolean('consentPolicy_dataToThirdParty')->nullable();
            $table->string('businessConfig')->nullable();
            $table->string('externalSiteUrl')->nullable();
            $table->boolean('trackClicksAnalytics')->nullable();
            $table->timestamps();
            $table->foreign('wix_site_id')->references('id')->on('wix_sites');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_site_properties');
    }
};
