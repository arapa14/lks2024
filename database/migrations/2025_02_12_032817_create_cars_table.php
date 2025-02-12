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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('no_car')->unique();
            $table->string('name_car');
            $table->string('type_car');
            $table->integer('year');
            $table->integer('seat');
            $table->string('image');
            $table->integer('total');
            $table->decimal('price');
            $table->enum('status', ['ready', 'borrow'])->default('ready');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
