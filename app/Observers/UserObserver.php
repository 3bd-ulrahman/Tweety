<?php

namespace App\Observers;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserObserver
{
    public function updating(User $user)
    {
        // accessors getAvatarAttribute in User Model will return avatar
        // as https://hostname/avtars/..... this will not work in delete we need path
        // so i using query builder to fetch avatar from DB
        $image = DB::table('users')->where('id', $user->id)->value('avatar');
        Storage::disk('avatars')->delete($image);
    }
}
