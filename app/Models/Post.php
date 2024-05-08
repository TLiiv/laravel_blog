<?php

namespace App\Models;

use Faker\Core\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File as FacadesFile;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {
   public $title;
   public $excerpt;
   public $date;
   public $body;
   public $slug;

   public function __construct($title,$excerpt, $date, $body ,$slug) {
    $this->title = $title;
    $this->excerpt = $excerpt;
    $this->date = $date;
    $this->body = $body;
    $this->slug = $slug;
   }
    public static function all() {
        $files = FacadesFile::files(resource_path("posts")); 

       return collect($files)
        ->map(function ($file) {
            return YamlFrontMatter::parseFile($file);
        })
            ->map(function ($document) {
            
            return new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            );
        });
}

    public static function find($slug)
    {
        //of all the blog posts, find the one with a slug that matches the one that was requested
        $posts = static::all();
        return $posts->firstWhere('slug',$slug);
    }
}