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
        Schema::create('d_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')
                ->constrained('d_restaurants')
                ->onDelete('cascade');
            $table->string('customer_name');
            $table->string('phone');
            $table->date('booking_date');
            $table->integer('total_people');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_bookings');
    }
};
