<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',  [\App\Http\Controllers\PostController::class, 'index']);



Route::get('/login', fn()=> inertia('Login'))->name('login');

Route::get('/signup', fn()=>inertia('Signup'));


Route::post('/login',[\App\Http\Controllers\Auth\LoginController::class, 'index']);

Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class,'register']);



Route::get('/{slug}/view',[\App\Http\Controllers\PostController::class, 'index']);


Route::group(['middleware' => 'auth'], function(){
        Route::post('/post/create',[\App\Http\Controllers\PostController::class, 'create']);
        Route::post('/logout', function () {
                Auth::logout();
                return redirect('/login');
        });
        Route::get('/post', fn() =>inertia('Post'));
});





