<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 categories
        $categories = category::factory()->count(10)->create();
        
        // Create 50 articles and attach random categories
        Article::factory()->count(50)->create()->each(function ($article) use ($categories) {
            // Attach 1-3 random categories to each article
            $randomCategories = $categories->random(rand(1, 3))->pluck('id');
            $article->categories()->attach($randomCategories);
        });
    }

}