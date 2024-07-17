<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        //dd(request(['search']));
        return view('posts', [
            'posts' => Post::latest()->filter(request(['search','category']))->get(),
            'categories' => Category::all(),
            'currentCategory' => Category::where('slug', request('category'))->first()
        ]);
    }

    public function show(Post $post){
      //Find a post by its slug and pass it to a view called "post"
      return view('post',[
        'post' => $post
    ]);
    }


}
