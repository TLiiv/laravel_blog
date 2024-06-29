<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File as FacadesFile;


Route::get('/', [PostsController::class,'index'])->name('home');

//Koos route model bindinguga
Route::get('posts/{post:slug}', [PostsController::class,'show']);

Route::get('categories/{category:slug}',function(Category $category){
    return view('posts',[
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()

    ]);
});

// Route::get('authors/{author:username}',function(User $author){
//     return view('posts',[
//         'posts' => $author->posts->load(['category'.'author'])
//     ]);
// });
Route::get('authors/{author:username}',function(User $author){
    return view('posts',[
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
})->name('category');
