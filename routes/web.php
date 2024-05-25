<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File as FacadesFile;


Route::get('/', function () {
    $posts = Post::all();
     return view('posts',[
        'posts' => Post::all()
    ]);

});



    // ddd($document->body());
    // $posts = Post::all();
    // return view('posts',[
    //     'posts' => $posts
    // ]);


// Route::get('posts/{post}', function($id){
// //Find a post by its slug and pass it to a view called "post"
// $post = Post::findOrFail( $id );
// return view('post',[
//     'post' => Post::findOrFail($id)
// ]);
// });

//Koos route model bindinguga
Route::get('posts/{post:slug}', function(Post $post){
    //Find a post by its slug and pass it to a view called "post"
    return view('post',[
        'post' => $post
    ]);
    });
