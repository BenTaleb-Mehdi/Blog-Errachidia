<?php 

namespace App\Service;
use Illuminate\Http\Request;
use App\Models\Article;


class ArticleService
{
    public function getArticle($fillter){
        $query = Article::query();
        
        if(isset($fillter['category']) && !empty($fillter['category'])){
            $query->whereHas('categories', function($q) use ($fillter) {
                $q->where('slug', $fillter['category']);
            });
        }
        return $query->with('categories')->orderBy('created_at','desc')->paginate(10);
    }


    public function deleteArticle($id){
        $article = Article::findOrFail($id);
        return $article->delete();
    }

    
}