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
        Schema::create('employments', function (Blueprint $table) {
            $table->id();
            $table->string('organization'); // Ex: Tribunal de Justiça do Estado do Paraná (TJPR)
            $table->string('role')->nullable(); // Ex: Estágio
            $table->string('department')->nullable(); // Ex: 3º Juizado de Violência Doméstica e Familiar
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('city')->nullable(); // Ex: Curitiba
            $table->string('country')->nullable(); // Ex: BR
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employments');
    }
};
