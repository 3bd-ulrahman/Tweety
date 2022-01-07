<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilesRequest;
use App\User;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->paginate(5)
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user, ProfilesRequest $request)
    {
        $attributes = $request->validated();

        if (request('avatar')) {
            $attributes['avatar']->store('avatars');
            $attributes['avatar'] = $attributes['avatar']->hashName();
        }

        $user->update($attributes);

        return redirect($user->path());
    }
}
