<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostsController::class,'index'])->name('home');

//Koos route model bindinguga
Route::get('posts/{post:slug}', [PostsController::class,'show']);


