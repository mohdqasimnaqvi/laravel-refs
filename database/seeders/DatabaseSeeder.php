<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Comment::truncate();
        User::truncate();
        Category::truncate();
        Post::truncate();
        Comment::factory(30)->create();
    }
}
