<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id', 'status'];

    public  function category()
    {
        return $this->belongsToMany(Category::class, 'article_categories');
    }
    public function User()
    {
       return $this->belongsTo(User::class);
    }
}
