<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'total_price',
    ];

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function planServices() : BelongsToMany
    {
        return $this->belongsToMany(PlanService::class)->using(Plan_PlanService::class);
    }
}
