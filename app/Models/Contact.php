<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'user_id',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}