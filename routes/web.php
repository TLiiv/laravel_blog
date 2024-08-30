<?php

use App\Http\Controllers\AdminPostsController;
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

Route::get('admin/posts',[AdminPostsController::class,'index'])->middleware('admin');
Route::get('admin/posts/create',[AdminPostsController::class,'create'])->middleware('admin');
Route::get('admin/posts/{post}/edit',[AdminPostsController::class,'edit'])->middleware('admin');
Route::patch('admin/posts/{post}',[AdminPostsController::class,'update'])->middleware('admin');
Route::delete('admin/posts/{post}',[AdminPostsController::class,'destroy'])->middleware('admin');
Route::post('admin/posts',[AdminPostsController::class,'store'])->middleware('admin');


