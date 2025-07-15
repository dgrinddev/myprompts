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
        Schema::create('prompts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title', 100); // Prompt title
            $table->enum('type', ['text', 'image', 'other'])->default('text'); // Type of prompt
            $table->text('content'); // Main text/content
            $table->text('excerpt')->nullable(); // Excerpt of the main text/content
            $table->enum('status', ['private', 'public'])->default('private'); // Visibility
            $table->uuid('share_url')->unique()->nullable(); // For sharing via link
            $table->string('hero_image', 255)->nullable(); // Path to hero image
            $table->foreignId('category_id')
                ->nullable() // allows a prompt to have no category
                ->constrained() // references 'categories' tabellen
                ->nullOnDelete(); // hvis en category slettes, sættes feltet til NULL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prompts');
    }
};
