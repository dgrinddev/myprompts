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
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();

            // Sikrer et unikt forhold til brugeren
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');

            // Sprogindstilling
            $table->enum('language', [
                'da',
                'en',
            ])->default('en');

            // Light-mode, Dark-mode eller System
            $table->enum('color_mode', [
                'light',
                'dark',
                'system',
            ])->default('light');

            /*
            // Tema
            $table->enum('theme', [
                'arctic',
                'minimal',
                'modern',
                'high-contrast',
                'neo-brutalism',
                'halloween',
                'zombie',
                'pastel',
                '90s',
                'christmas',
                'prototype',
                'news',
                'industrial',
            ])->default('modern');
            */

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_settings');
    }
};
