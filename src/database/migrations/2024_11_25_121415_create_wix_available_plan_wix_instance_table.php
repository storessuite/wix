<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wix_available_plan_wix_instance', function (Blueprint $table) {
            $table->unsignedBigInteger('wix_instance_id');
            $table->unsignedBigInteger('wix_available_plan_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_available_plan_wix_instance');
    }
};
