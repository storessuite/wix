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
        Schema::create('wix_instances', function (Blueprint $table) {
            $table->id();
            $table->string('instance_instanceId');
            $table->string('instance_appName');
            $table->string('instance_appVersion')->nullable();
            $table->boolean('instance_isFree')->nullable();
            $table->string('instance_billing_packageName')->nullable();
            $table->string('instance_billing_billingCycle')->nullable();
            $table->string('instance_billing_timeStamp')->nullable();
            $table->string('instance_billing_expirationDate')->nullable();
            $table->boolean('instance_billing_autoRenewing')->nullable();
            $table->string('instance_billing_invoiceId')->nullable();
            $table->string('instance_billing_source')->nullable();
            $table->string('instance_billing_freeTrialInfo_status')->nullable();
            $table->string('instance_billing_freeTrialInfo_endDate')->nullable();
            $table->string('instance_originInstanceId')->nullable();
            $table->boolean('instance_isOriginSiteTemplate')->nullable();
            $table->boolean('instance_copiedFromTemplate')->nullable();
            $table->boolean('instance_freeTrialAvailable')->nullable();
            $table->string('site_siteDisplayName')->nullable();
            $table->string('site_locale')->nullable();
            $table->string('site_paymentCurrency')->nullable();
            $table->string('site_multilingual_isMultiLingual')->nullable();
            $table->string('site_url')->nullable();
            $table->text('site_description')->nullable();
            $table->string('site_ownerEmail')->nullable();
            $table->string('site_ownerInfo_email')->nullable();
            $table->string('site_ownerInfo_emailStatus')->nullable();
            $table->string('site_siteId')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_instances');
    }
};
