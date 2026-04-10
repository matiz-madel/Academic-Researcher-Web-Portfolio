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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->json('subtitle')->nullable();
            $table->json('bio')->nullable();
            $table->json('aliases')->nullable(); // Lista de AKAs
            $table->string('avatar_jpeg')->nullable();
            $table->string('avatar_gif')->nullable();
            $table->string('email')->nullable()->after('aliases');
            $table->string('phone')->nullable()->after('email');
            $table->boolean('is_whatsapp')->default(true)->after('phone');
            $table->json('default_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
