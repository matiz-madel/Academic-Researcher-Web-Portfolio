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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Título da publicação
            $table->string('type')->nullable(); // Tipo no ORCID (ex: journal-article, book-chapter, dissertation)
            $table->text('abstract')->nullable(); // Resumo
            $table->text('content')->nullable(); // O conteúdo completo do texto para o seu site
            $table->date('publication_date')->nullable(); // Data de publicação
            $table->string('doi')->nullable(); // Identificador global DOI, vital para o ORCID
            $table->string('url')->nullable(); // Link externo, se houver
            $table->string('keyword_1')->nullable();
            $table->string('keyword_2')->nullable();
            $table->string('keyword_3')->nullable();
            $table->string('keyword_4')->nullable();
            $table->string('keyword_5')->nullable();
            $table->json('attachments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
