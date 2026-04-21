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
            $table->json('title'); // Publication title
            $table->string('type')->nullable(); // ORCID type (e.g., journal-article, book-chapter, dissertation)
            $table->json('abstract')->nullable(); // Abstract or summary
            $table->json('content')->nullable(); // Full content for the website
            $table->date('publication_date')->nullable(); // Publication date
            $table->string('doi')->nullable(); // Global DOI identifier, vital for ORCID
            $table->text('url')->nullable(); // External link, if available
            $table->json('keyword_1')->nullable();
            $table->json('keyword_2')->nullable();
            $table->json('keyword_3')->nullable();
            $table->json('keyword_4')->nullable();
            $table->json('keyword_5')->nullable();
            $table->json('attachments')->nullable(); // Array of file paths
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
