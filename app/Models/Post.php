<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','excerpt', 'body','slug','category_id'];
    //protected $guarded = ['id'];

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, function($query, $search) {
            $query->where(function($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            // $query->whereExists(function($query) use ($category) {
            //     $query->from('categories')
            //           ->whereColumn('categories.id', 'posts.category_id')
            //           ->where('categories.slug', $category);
            // });
            $query->whereHas('category',function($query) use ($category){
                $query->where('slug',$category);
            });
        });
        $query->when($filters['author'] ?? false, function($query, $author) {
            $query->whereHas('author',function($query) use ($author){
                $query->where('username',$author);
            });
        });

        return $query;
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(User::class, 'user_id'); // peab eraldi välja kirjutama sest laravel eeldab, et on author_id
    }
}
