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
        Schema::create('send_orders', function (Blueprint $table) {
            $table->id();
            $table->string('sender_name');
            $table->string('receiver_name');
            $table->string('pickup_location');
            $table->string('destination');
            $table->integer('distance');
            $table->string('item_name');
            $table->integer('price');
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
        Schema::dropIfExists('send_orders');
    }
};
