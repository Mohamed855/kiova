<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CallRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'user_id',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
