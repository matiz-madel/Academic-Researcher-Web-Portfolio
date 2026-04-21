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
        Schema::create('metadata', function (Blueprint $table) {
            $table->id();

            // Core SEO
            $table->json('title_suffix')->nullable();
            $table->json('description')->nullable();
            $table->json('keywords')->nullable();
            $table->string('robots')->default('index, follow');
            $table->string('theme_color')->default('#ffffff');

            // Images
            $table->string('favicon')->nullable();
            $table->string('og_image')->nullable();

            // Semantic JSON Containers
            $table->json('social_metadata')->nullable();
            $table->json('academic_metadata')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metadata');
    }
};
