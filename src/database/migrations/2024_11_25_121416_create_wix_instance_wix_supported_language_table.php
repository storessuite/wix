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
        Schema::create('wix_instance_wix_supported_language', function (Blueprint $table) {
            $table->unsignedBigInteger('wix_instance_id');
            $table->unsignedBigInteger('wix_supported_language');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_instance_wix_supported_language');
    }
};
