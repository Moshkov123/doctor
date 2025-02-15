<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Record extends Model
{
    protected $fillable = ['data', 'users_id', 'doctors_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // Связь с врачом (к кому записались)
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'doctors_id');
    }
}
