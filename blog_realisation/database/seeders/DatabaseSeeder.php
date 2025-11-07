<?php

namespace Database\Seeders;

use App\Models\article;
use App\Models\comments;
use App\Models\tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(10)->create();
        article::factory(10)->create();
        comments::factory(10)->create();
        tag::factory(10)->create();


    }
}
