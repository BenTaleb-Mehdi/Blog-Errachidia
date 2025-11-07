<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class favorites extends Model
{
    
    public function Articles(){
        return $this->belongsTo(Article::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
