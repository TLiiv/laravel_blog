<?php

use App\Http\Controllers\PostsCommentsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('ping',function(){
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
	'apiKey' => config('services.mailchimp.key'),
	'server' => config('services.mailchimp.server'),
]);

 $response = $mailchimp->lists->addListMember("c1088b37af",[
    'email_address' => 'randomemail@random.com',
    'status' => 'subscribed'
 ]);
 dd($response);

});

Route::get('/', [PostsController::class,'index'])->name('home');

//Koos route model bindinguga
Route::get('posts/{post:slug}', [PostsController::class,'show']);
Route::post('posts/{post:slug}/comments',[PostsCommentsController::class,'store']);

Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::get('login',[SessionsController::class,'create'])->middleware('guest');
Route::post('sessions',[SessionsController::class,'store'])->middleware('guest');
Route::post('logout',[SessionsController::class,'destroy'])->middleware('auth');


