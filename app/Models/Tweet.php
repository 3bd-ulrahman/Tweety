<?php

namespace App\Models;

use App\Models\Concerns\likeable;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tweet extends Model
{
    use likeable;

    protected $fillable = ['user_id', 'body'];

    // relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
