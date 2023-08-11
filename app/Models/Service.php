<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'gallery_id',
        'description',
    ];

    public function gallery(): HasOne
    {
        return $this->HasOne(Gallery::class);
    }
    public function project(): HasMany
    {
        return $this->HasMany(Project::class);
    }
}
