<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Service\ArticleService;
use Illuminate\Support\Facades\Route;

Route::get('/',[ArticleController::class,'index'])->name('articles.index');
Route::delete('/articles/{id}',[ArticleController::class,'destroy'])->name('articles.destroy');