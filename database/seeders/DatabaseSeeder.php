<?php

namespace Database\Seeders;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Post::factory()
            ->has(Comment::factory()->count(3))
            ->create();

        // Creating a user with posts and comments
        User::factory()
            ->hasPosts(3)
            ->hasComments(5)
            ->create();

        // Seed products
        Product::factory(20)->create();
    }
}
