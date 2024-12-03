<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use StoresSuite\Wix\Models\WixCollection;
use StoresSuite\Wix\Models\WixMedia;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wix_collection_wix_media', function (Blueprint $table) {
            $table->foreignIdFor(WixCollection::class);
            $table->foreignIdFor(WixMedia::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_collection_wix_media');
    }
};
