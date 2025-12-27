<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
   // app/Models/Article.php
    protected $fillable = ['title', 'content', 'statut','user_id'];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_category', 'article_id', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
