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
        Schema::create('prompt_tag', function (Blueprint $table) {
            $table->id();

            // Felter til references
            $table->foreignId('prompt_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');

            // Hvis du vil sikre dig, at en prompt ikke kan have samme tag 2 gange,
            // kan du lave en unik constraint
            $table->unique(['prompt_id', 'tag_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prompt_tag');
    }
};
