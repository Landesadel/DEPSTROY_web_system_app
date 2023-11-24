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
        Schema::create('waste', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->string('number_car');
            $table->boolean('is_exactly')->nullable();
            $table->integer('wood')->nullable();
            $table->integer('dirt')->nullable();
            $table->integer('concrete')->nullable();
            $table->integer('brick')->nullable();
            $table->boolean('is_awning')->nullable();
            $table->string('statement')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste');
    }
};
