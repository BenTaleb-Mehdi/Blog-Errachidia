<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Service\ArticleService;

class ArticleController extends Controller
{

    protected $articleService;

    public function __construct(ArticleService $articleService){
        $this->articleService = $articleService;
    }


    public function index(request $request){
        $filters = $request->only('category');
        $articles = $this->articleService->getArticle($filters);
        return view('Article.index',compact('articles'));
    }


    public function destroy($id){
        $this->articleService->deleteArticle($id);
        return redirect()->route('articles.index')->with('success','Article deleted successfully');
    }

    
}
