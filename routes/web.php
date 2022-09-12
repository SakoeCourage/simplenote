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



Route::get('/login', function(){return inertia('Login');})->name('login')->middleware('guest');

Route::get('/signup', function(){return (inertia('Signup'));})->middleware('guest');


Route::post('/login',[\App\Http\Controllers\Auth\LoginController::class, 'index']);

Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class,'register']);
Route::get('/users', [\App\Http\Controllers\PageController::class,'getUsers']);



Route::get('/{slug}/view',[\App\Http\Controllers\PostController::class, 'index']);
Route::get('/{post:slug}/json',[\App\Http\Controllers\PostController::class, 'getPostItemBySlug']);






Route::group(['middleware' => 'auth'], function(){
        Route::post('/post/create',[\App\Http\Controllers\PostController::class, 'create']);
        Route::post('/logout', [\App\Http\Controllers\Auth\Logout::class, 'logout']);
        Route::get('/create', [\App\Http\Controllers\PostController::class, 'show']);
        Route::get('/post/edit/{post:slug}',[\App\Http\Controllers\PostController::class, 'edit']);
        Route::post('/post/edit/{post:slug}',[\App\Http\Controllers\PostController::class, 'update']); 
        Route::post('/post/delete/{post}',[\App\Http\Controllers\PostController::class, 'destroy']); 
        Route::post('/',[\App\Http\Controllers\PostController::class, 'index'])->name('Home');
        Route::get('/trash',[\App\Http\Controllers\PostController::class, 'index'])->name('trash');
        Route::get('/archive',[\App\Http\Controllers\PostController::class, 'index'])->name('archive');
        Route::post('/archive/marksAsArchive/{id}',[\App\Http\Controllers\PostController::class, 'markAsArchive']);
        Route::post('/archive/removefromArchive/{id}',[\App\Http\Controllers\PostController::class, 'removefromArchive']);
});





