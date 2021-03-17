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
        'tweets' => Tweet::all()
    ]);
})->middleware(['auth'])->name('home');

require __DIR__.'/auth.php';