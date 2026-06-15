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
        Schema::create('transit_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transit_id');
            $table->string('customer_name');
            $table->string('phone');
            $table->date('booking_date');
            $table->integer('total_passenger');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transit_bookings');
    }
};
