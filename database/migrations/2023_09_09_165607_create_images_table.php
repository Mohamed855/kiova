<?php

use App\Models\Project;
use App\Models\Service;
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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('src');
            $table->string('alt')->nullable();
            $table->integer('width');
            $table->integer('height');
            $table->string('page');
            $table->integer('section');
            $table->foreignIdFor(Service::class)->nullable();
            $table->foreignIdFor(Project::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
