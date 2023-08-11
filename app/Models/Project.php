<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'gallery_id',
        'service_id',
        'description',
    ];

    public function gallery(): HasOne
    {
        return $this->HasOne(Gallery::class);
    }
    public function service(): BelongsTo
    {
        return $this->BelongsTo(Service::class);
    }
}
