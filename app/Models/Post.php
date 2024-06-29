<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','excerpt', 'body','slug','category_id'];
    //protected $guarded = ['id'];

public function scopeFilter($query, array $filters){
    if ($filters['search'] ?? false) {
        $query->where('title', 'like', '%' . request('search') . '%')
              ->orWhere('body', 'like', '%' . request('search') . '%');
    }

}

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(User::class, 'user_id'); // peab eraldi välja kirjutama sest laravel eeldab, et on author_id
    }
}
