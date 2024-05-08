<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('/', function () {
    $posts = Post::all();
    return view('posts',[
        'posts' => $posts
    ]);
});

Route::get('posts/{post}', function($slug){
//Find a post by its slug and pass it to a view called "post"
$post = Post::find( $slug );
return view('post',[
    'post' => $post
]);
})->where('post','[A-z_\-]+');
