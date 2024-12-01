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
        Schema::create('wix_sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('_id');
            $table->uuid('htmlAppId')->nullable();
            $table->string('name')->nullable();
            $table->string('displayName')->nullable();
            $table->string('createdDate')->nullable();
            $table->string('updatedDate')->nullable();
            $table->string('trashedDate')->nullable();
            $table->boolean('published')->nullable();
            $table->boolean('premium')->nullable();
            $table->string('viewUrl')->nullable();
            $table->string('editUrl')->nullable();
            $table->string('thumbnail')->nullable();
            $table->uuid('ownerAccountId')->nullable();
            $table->string('editorType')->nullable();
            $table->boolean('blocked')->nullable();
            $table->uuid('folderId')->nullable();
            $table->string('namespace')->nullable();
            $table->boolean('domainConnected')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wix_sites');
    }
};
