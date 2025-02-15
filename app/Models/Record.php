<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Record extends Model
{
    protected $fillable = ['data', 'users_id', 'doctors_id'];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
