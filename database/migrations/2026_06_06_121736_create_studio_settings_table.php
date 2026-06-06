<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('studio_settings', function (Blueprint $table) {
            $table->id();
            // About Us & Bio content
            $table->text('owner_bio')->nullable();
            $table->string('owner_photo_path')->nullable();
            $table->text('studio_address')->nullable();
            $table->string('opening_hours')->nullable();
            
            // Dynamic Branding / Colors
            $table->string('primary_color', 7)->default('#8B5A2B'); // Terracotta defaults
            $table->string('secondary_color', 7)->default('#F5F5F4'); 
            $table->string('accent_color', 7)->default('#D97706');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('studio_settings');
    }
};
