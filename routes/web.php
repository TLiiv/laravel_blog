<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostsCommentsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;




Route::get('/', [PostsController::class,'index'])->name('home');

//Koos route model bindinguga
Route::get('posts/{post:slug}', [PostsController::class,'show']);
Route::post('posts/{post:slug}/comments',[PostsCommentsController::class,'store']);

Route::post('newsletter',NewsletterController::class);

Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::post('sessions',[SessionsController::class,'store'])->middleware('guest');
Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');

Route::get('admin/posts/create',[PostsController::class,'create'])->middleware('admin');
Route::post('admin/posts',[PostsController::class,'store'])->middleware('admin');


