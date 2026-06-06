<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->datetime('event_date');
            $table->decimal('price', 10, 2);
            $table->integer('max_capacity');
            $table->integer('spots_remaining');
            $table->timestamps();
        });

        Schema::create('workshop_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('workshop_id')->constrained()->onDelete('cascade');
            $table->string('stripe_session_id')->unique()->nullable();
            $table->integer('spots_booked');
            $table->string('payment_status')->default('pending'); // pending, paid
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workshop_bookings');
        Schema::dropIfExists('workshops');
    }
};  