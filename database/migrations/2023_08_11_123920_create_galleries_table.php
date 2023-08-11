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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('img_1');
            $table->string('img_2')->nullable();
            $table->string('img_3')->nullable();
            $table->string('img_4')->nullable();
            $table->string('img_5')->nullable();
            $table->string('img_6')->nullable();
            $table->string('img_7')->nullable();
            $table->string('img_8')->nullable();
            $table->string('img_9')->nullable();
            $table->string('img_10')->nullable();
            $table->string('img_11')->nullable();
            $table->string('img_12')->nullable();
            $table->string('img_13')->nullable();
            $table->string('img_14')->nullable();
            $table->string('img_15')->nullable();
            $table->string('img_16')->nullable();
            $table->string('img_17')->nullable();
            $table->string('img_18')->nullable();
            $table->string('img_19')->nullable();
            $table->string('img_20')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
