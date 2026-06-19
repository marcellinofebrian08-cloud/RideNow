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
        Schema::create('ride_orders', function (Blueprint $table) {
            $table->id();
            $table->string('passenger_name');
            $table->string('pickup_location');
            $table->string('destination');
            $table->enum('ride_type', ['Bike', 'Car']);
            $table->integer('price');
            $table->integer('distance')->nullable();
            $table->string('status')->default('Pending');
            $table->string('driver_name')->nullable();
            $table->string('plate_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ride_orders');
    }
};
