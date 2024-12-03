<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use StoresSuite\Wix\Models\WixProduct;
use StoresSuite\Wix\Models\WixSite;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wix_choices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignIdFor(WixSite::class);
            $table->foreignIdFor(WixProduct::class);
            $table->string('value')->nullable();
            $table->string('description')->nullable();
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
            $table->boolean('inStock')->nullable();
            $table->boolean('visible')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_choices');
    }
};
