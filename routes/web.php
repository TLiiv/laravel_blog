<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('posts');
});
//enne
// Route::get('post', function(){
//     return view('post', [
//         'post'=> file_get_contents(__DIR__ . '/../resources/posts/my-first-post.html'), //nüüd on $post olemas
//     ]);
// });
//pärast
Route::get('posts/{post}', function($slug){
    $path = __DIR__ . "/../resources/posts/{$slug}.html";
    if(! file_exists($path)){
        return redirect("/");
        // abort(404);
    };
    $post = cache()->remember("posts.{$slug}", 5, function() use ($path){
        return file_get_contents($path);
    });
    
    return view('post', [
        'post'=> $post
    ]);
})->where('post','[A-z_\-]+');
//enne oli enne oli ->whereAlpha('post') aga see ei luba - _ routei