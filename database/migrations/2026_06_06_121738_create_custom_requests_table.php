<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('custom_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('description')->comment('Client specifications, color notes, etc.');
            $table->decimal('requested_height', 8, 2)->nullable();
            $table->decimal('requested_diameter', 8, 2)->nullable();
            $table->string('clay_type')->nullable();
            $table->string('glaze_type')->nullable();
            $table->string('sketch_image_path')->comment('Reference sketch drawing');
            
            // Workflow States & Quoting
            $table->string('status')->default('pending_review'); // pending_review, quoted, paid, in_production, ready_for_pickup
            $table->decimal('quoted_price', 10, 2)->nullable();
            $table->string('stripe_payment_intent_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('custom_requests');
    }
};
