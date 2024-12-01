<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use StoresSuite\Models\WixSite;
use StoresSuite\Models\WixSiteContributor;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wix_assignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(WixSiteContributor::class);
            $table->foreignIdFor(WixSite::class);
            $table->string('_id');
            $table->string('policy_policyId')->nullable();
            $table->string('policy_title')->nullable();
            $table->text('policy_description')->nullable();
            $table->string('subject_id')->nullable();
            $table->string('subject_subjectType')->nullable();
            $table->string('subject_context_id')->nullable();
            $table->string('subject_context_contextType')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_assignments');
    }
};
