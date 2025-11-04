<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'article_name',
        'des'
    ];

    public function user(){
        return $this->hasMany(User::class);
    }
    
    public function Tag(){
        return $this->belongsTo(Tag::class);
    }
}
