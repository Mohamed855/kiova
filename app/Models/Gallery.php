<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'img_1',
        'img_2',
        'img_3',
        'img_4',
        'img_5',
        'img_6',
        'img_7',
        'img_8',
        'img_9',
        'img_10',
        'img_11',
        'img_12',
        'img_13',
        'img_14',
        'img_15',
        'img_16',
        'img_17',
        'img_18',
        'img_19',
        'img_20',
    ];

    public function project(): BelongsTo
    {
        return $this->BelongsTo(Project::class);
    }

    public function service(): BelongsTo
    {
        return $this->BelongsTo(Service::class);
    }
}
