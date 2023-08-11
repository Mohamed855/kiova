<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlanService extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
    ];

    public function plans() : BelongsToMany
    {
        return $this->belongsToMany(Plan::class)->using(Plan_PlanService::class);
    }
}
