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

Route::get('/home', function () {
    return view('home' , [
        'tweets' => auth()->user()->timeline()
    ]);
})->middleware(['auth'])->name('home');

Route::post('/tweet' , 'App\Http\Controllers\TweetController@create');

require __DIR__.'/auth.php';
