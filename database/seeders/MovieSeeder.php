<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Movie::create([
           'title' => 'PAST LIVES',
           'publication_status' => true,
           'poster_link' => '/posters/past lives.jpg',

       ]);
        Movie::create([
            'title' => 'JOHN WICK: CHAPTER 4',
            'publication_status' => true,
            'poster_link' => '/posters/JOHN WICK CHAPTER 4.jpg',

        ]);

        Movie::create([
            'title' => 'MISSION: IMPOSSIBLE - DEAD RECKONING PART ONE',
            'publication_status' => true,
            'poster_link' => '/posters/MISSION IMPOSSIBLE.jpg',

        ]);
    }
}
