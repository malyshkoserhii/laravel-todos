<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function todo(): BelongsTo
    {
        return $this->belongsto(Todo::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsto(User::class);
    }
}
