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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role' , ['passenger', 'admin', 'driver'])->nullable();
            $table->string('profilepicture')->nullable();
            $table->string('phone')->nullable();
            $table->string('description')->nullable();
            $table->string('immatriculation')->nullable();
            $table->string('car_type')->nullable();
            $table->string('payment')->nullable();
            $table->enum('status', ['available', 'unavailable', 'driving'])->default('unavailable');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
