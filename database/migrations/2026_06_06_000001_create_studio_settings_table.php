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
        Schema::create('studio_settings', function (Blueprint $table) {
            $table->id();
            $table->text('owner_bio')->nullable();
            $table->string('owner_photo_path')->nullable();
            $table->text('studio_address')->nullable();
            $table->string('opening_hours')->nullable();
            $table->string('primary_color', 7)->default('#8B5A2B');
            $table->string('secondary_color', 7)->default('#F5F5F4');
            $table->string('accent_color', 7)->default('#D97706');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studio_settings');
    }
};
