<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostsController::class,'index'])->name('home');

//Koos route model bindinguga
Route::get('posts/{post:slug}', [PostsController::class,'show']);

Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::post('logout',[SessionsController::class,'destroy']);


