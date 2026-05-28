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
        Schema::create('d_food', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')
                ->constrained('d_restaurants')
                ->onDelete('cascade');
            $table->foreignId('category_id')
                ->constrained('d_categories')
                ->onDelete('cascade');
            $table->string('name');
            $table->integer('price');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_food');
    }
};
