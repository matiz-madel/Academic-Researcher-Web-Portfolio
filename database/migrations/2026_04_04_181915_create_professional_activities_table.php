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
        Schema::create('professional_activities', function (Blueprint $table) {
            $table->id();
            $table->string('activity_type')->nullable();
            $table->json('title');
            $table->json('organization');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professional_activities');
    }
};
