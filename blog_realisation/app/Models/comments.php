<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'user_id',
        'guest_name',
        'content',
        'is_approved',
    ];

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function Article(){
        return $this->hasMany(article::class,'article_id');
    }

    

}
