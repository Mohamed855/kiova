<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
    public function services(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
