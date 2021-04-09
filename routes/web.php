<?php

use Illuminate\Support\Facades\Route;
use App\Models\Tweet;


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

Route::get('/home', 'App\Http\Controllers\TweetController@list')->middleware(['auth'])->name('home');

Route::post('/tweet' , 'App\Http\Controllers\TweetController@create')->middleware(['auth']);

Route::get('/profiles/{user:username}','App\Http\Controllers\ProfilesController@show')->middleware(['auth'])->name('profile');

Route::post('/profiles/{user:username}/follow', 'App\Http\Controllers\FollowsController@store')->middleware(['auth']);

Route::get('/profiles/{user:username}/edit','App\Http\Controllers\ProfilesController@edit')->middleware(['auth']);

Route::patch(
    '/profiles/{user:username}',
    'App\Http\Controllers\ProfilesController@update'
)->middleware(['auth']);

Route::get('/explore','App\Http\Controllers\ExploreController')->middleware(['auth']);


require __DIR__.'/auth.php';
