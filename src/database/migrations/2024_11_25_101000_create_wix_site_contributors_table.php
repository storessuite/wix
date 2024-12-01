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
        Schema::create('wix_site_contributors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('_id');
            $table->string('metaData_id')->nullable();
            $table->string('metaData_fullName')->nullable();
            $table->string('metaData_imageUrl')->nullable();
            $table->string('metaData_email')->nullable();
            $table->boolean('isTeam')->nullable();
            $table->string('joinedAt')->nullable();
            $table->string('invitedEmail')->nullable();
            $table->boolean('isClient')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_site_contributors');
    }
};
