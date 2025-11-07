<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;


    protected $fillable = [
        'name'
    ];


    public function Articles(){
        return $this->belongsToMany(article::class,'article_tag','article_id','tag_id');
    }
    
}
