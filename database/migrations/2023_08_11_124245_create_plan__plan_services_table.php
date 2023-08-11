<?php

use App\Models\Plan;
use App\Models\PlanService;
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
        Schema::create('plan__plan_services', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Plan::class);
            $table->foreignIdFor(PlanService::class);
            $table->boolean('supported') -> default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan__plan_services');
    }
};
