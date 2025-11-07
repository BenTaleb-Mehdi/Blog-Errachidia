<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'category',
        'region',
        'views',
        'shares',
        'status',
        'author_id',
        'published_at',
        'is_accepted'
    ];


    public function Author(){
        return $this->belongsTo(User::class,'author_id');
    }

    public function tags(){
        return $this->belongsToMany(tag::class,'article_tag','article_id','tag_id');
    }

    public function comments(){
        return $this->hasMany(comments::class)->where('is_approved',true);
    }

    public function favorites(){
        return $this->hasMany(favorites::class);
    }
  
}
