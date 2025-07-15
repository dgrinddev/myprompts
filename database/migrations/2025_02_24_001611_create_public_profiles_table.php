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
        Schema::create('public_profiles', function (Blueprint $table) {
            $table->id();
            // Sikrer et unikt forhold til brugeren
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            // Angiver om den offentlige profil er aktiv
            $table->boolean('is_active')->default(false);
            // En kort bio eller introduktion
            $table->string('bio', 255)->nullable();
            // Mulighed for at uploade et header-billede
            $table->string('img', 100)->nullable();
            // View-indstilling: 'table' eller 'grid'
            $table->enum('view_option', ['table', 'grid'])->default('table');
            // Layout-indstilling: 'single' (én lang liste) eller 'foldered' (opdelt efter kategori)
            $table->enum('layout_option', ['single_list', 'categorized'])->default('single_list');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_profiles');
    }
};
