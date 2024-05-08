<?php

namespace App\Models;

use Faker\Core\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File as FacadesFile;

class Post {
   
    public static function all() {
       $files = FacadesFile::files(resource_path("posts/"));
       return array_map(function($file) {
      return $file->getContents();
    }, $files);
}

    public static function find($slug){
        base_path();
        $path = resource_path("posts/{$slug}.html");
            if(! file_exists($path)){
               throw new ModelNotFoundException();
                // abort(404);
            };
            return  cache()->remember("posts.{$slug}", 1200, function() use ($path){
                return file_get_contents($path);
            });
            
           
    }
}