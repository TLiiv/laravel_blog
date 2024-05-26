<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File as FacadesFile;


Route::get('/', function () {
    $posts = Post::all();
     return view('posts',[
        'posts' => Post::latest()->with('category','author')->get()
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

Route::get('categories/{category:slug}',function(Category $category){
    return view('posts',[
        'posts' => $category->posts->load(['category'.'author'])
    ]);
});

Route::get('authors/{author:username}',function(User $author){
    return view('posts',[
        'posts' => $author->posts->load(['category'.'author'])
    ]);
});
