<?php

namespace App;

use App\Models\Concerns\Followable;
use App\Models\Like;
use App\Models\Tweet;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'avatar', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        return $value ? asset('storage/avatars/'.$value) : asset('images/default.png');
    }

    public function setPasswordAttribute($value = '')
    {
        // if (is_null($value) && strlen($value) == 0) {
        //     return;
        // }
        // if (!is_null($value) && strlen($value) == 60 && preg_match('/^\$2y\$/', $value)) {
        //     return $this->attributes['password'] = $value ?? '';
        // } else {
        //     return $this->attributes['password'] = Hash::make($value);
        // }


        if (! is_string($value) || strlen($value) == 0) {
            return;
        }
        return $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    public function path($append = '')
    {
        $path = route('profile', $this->username);
        return $append ? "{$path}/{$append}" : $path;
    }

    public function timeline()
    {
        $freinds = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $freinds)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->latest()
            ->paginate(config('app.pagination'));
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class, 'user_id')->latest();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
