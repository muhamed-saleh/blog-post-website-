<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Author::factory(5)->create()->each(function ($author) {
            Post::factory(rand(3, 5))->create([
                'author_id' => $author->id,
            ]);
        });
    }
}
