<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movie_genre')->insert([
            ['movie_id' => 1, 'genre_id' => 2],
            ['movie_id' => 2, 'genre_id' => 1],
            ['movie_id' => 3, 'genre_id' => 3],
            ]);


//        $movies = Movie::find(1);
//        $genres = Genre::find(2);
//
//
//        if ($movies && $genres) {
//            $movies->genres()->attach($genres);
//        }
    }
}
