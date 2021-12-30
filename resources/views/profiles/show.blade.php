@extends('layouts.app')

@section('content')

    <header class="mb-6">

        <img src="/images/default-profile-banner.jpg" alt="">

        <div class="flex justify-between">

            <div>
                <h2>{{ $user->name }}</h2>
                <p>Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div>
                <a href="" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">
                    Edit Profile
                </a>
                <a href="" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">
                    Follow Me
                </a>
            </div>

        </div>

    </header>

    @include('partials._tiemline', [
        'tweets' => $user->tweets
    ])

@endsection
