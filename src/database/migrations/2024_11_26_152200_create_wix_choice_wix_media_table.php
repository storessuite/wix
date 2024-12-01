<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use StoresSuite\Models\WixChoice;
use StoresSuite\Models\WixMedia;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wix_choice_wix_media', function (Blueprint $table) {
            $table->foreignIdFor(WixChoice::class);
            $table->foreignIdFor(WixMedia::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_choice_wix_media');
    }
};
