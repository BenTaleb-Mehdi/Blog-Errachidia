<?php 

namespace App\Service;

use App\Models\Article;

class ArticleService
{
    // Get all articles with optional category filter
    public function getArticle($filter)
    {
        $query = Article::query();
        
        if (isset($filter['category']) && !empty($filter['category'])) {
            $query->whereHas('categories', function($q) use ($filter) {
                $q->where('slug', $filter['category']);
            });
        }

        return $query->with('categories')->orderBy('created_at', 'desc')->paginate(5);
    }


    // Create Article with categories
    public function createArticle(array $data)
    {
        $data['user_id'] = auth()->id();
        // Create article
        $article = Article::create([
            'title'  => $data['title'],
            'statut' => $data['statut'],
            'content' => $data['content'],
            'user_id' => $data['user_id']
        ]);

        // Attach categories
        if (!empty($data['categories'])) {
            $article->categories()->attach($data['categories']);
        }

        return $article;
    }


    
    public function deleteArticle($id)
    {
        $article = Article::findOrFail($id);
        return $article->delete();
    }
}
