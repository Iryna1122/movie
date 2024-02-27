<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create(['name_genres' => 'Action']);
        Genre::create(['name_genres' => 'Drama']);
        Genre::create(['name_genres' => 'Comedy']);
        Genre::create(['name_genres' => 'Adventures']);
    }
}
