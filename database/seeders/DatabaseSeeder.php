<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name'  => 'Lutfi afandi',
            'username'  => 'admin',
            'email' => 'admin@gmail.com',
            'password'  => bcrypt('admin')
        ]);
        User::factory(2)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'alex',
        //     'email' => 'alex@example.com',
        //     'password'  => bcrypt('12345')
        // ]);

        Category::create([
            'name'  => 'Web Programming',
            'slug'  => 'web-programming',
        ]);
        Category::create([
            'name'  => 'Personal',
            'slug'  => 'personal',
        ]);
        Category::create([
            'name'  => 'Web Design',
            'slug'  => 'web-design',
        ]);

        Post::factory(20)->create();
    }
}
