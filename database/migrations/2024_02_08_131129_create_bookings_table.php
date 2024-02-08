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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('passengers');
            $table->float('total_price');
            $table->enum('status', ['active', 'canceled', 'valid']);
            $table->foreignId('passenger_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('schedule_id')->constrained('driver_schedules')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
