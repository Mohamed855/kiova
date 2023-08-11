<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Plan_PlanService extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'plan_service_id',
        'supported',
    ];
}
