<?php

namespace App\Models;

use Faker\Core\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File as FacadesFile;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }
    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {

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
                })
                ->sortByDesc('date');
        });
    }

    public static function find($slug)
    {
        //of all the blog posts, find the one with a slug that matches the one that was requested
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug)
    {
        //of all the blog posts, find the one with a slug that matches the one that was requested
        $post = static::find($slug);
        if (!$post) {
            throw new ModelNotFoundException();
        }
        return $post;
    }
}