<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(50)->create();
        \App\Models\Post::factory(100)->create();
        \App\Models\Image::factory(100)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Country::factory(2)->create();
        \App\Models\City::factory(50)->create();
        \App\Models\PostAdditionalData::factory(50)->create();
        \App\Models\Comment::factory(50)->create();
        \App\Models\Vacancy::factory(50)->create();
        \App\Models\Company::factory(50)->create();
        \App\Models\People::factory(50)->create();
    }
}
