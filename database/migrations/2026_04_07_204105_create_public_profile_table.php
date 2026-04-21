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
        Schema::create('public_profile', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->json('subtitle')->nullable();
            $table->json('subtitle_variations')->nullable();
            $table->json('bio')->nullable();
            $table->json('aliases')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('is_whatsapp')->default(true);
            $table->json('default_message')->nullable();
            $table->string('avatar_jpeg')->nullable();
            $table->string('avatar_gif')->nullable();
            $table->string('avatar_og')->nullable();
            $table->string('resume_pdf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_profile');
    }
};
