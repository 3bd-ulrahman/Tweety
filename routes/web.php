<?php

// use Illuminate\Support\Facades\DB;
// DB::listen(function ($query) {
//     var_dump($query->sql, $query->bindings);
// });

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::middleware('auth')->group(function () {

    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store');

    Route::post('tweets/{tweet}/like', 'TweetLikesController@store');
    Route::delete('tweets/{tweet}/like', 'TweetLikesController@destroy');

    Route::post('/profile/{user:username}/follow', 'FollowsController@store')->name('follow');

    Route::get('/profile/{user:username}/edit', 'ProfilesController@edit')->middleware('can:edit,user');
    Route::patch('/profile/{user:username}', 'ProfilesController@update')->middleware('can:edit,user');

    Route::get('explore', 'ExploreController');
});

Route::get('/profile/{user:username}', 'ProfilesController@show')->name('profile');


Route::get('test', function () {
    $user = new User;
    dd(
        $user->follows()->pluck('id')
    );
});
