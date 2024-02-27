<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieGenre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::all();
        return view('movies.movies', compact('movies'));
    }

    public function allMovie()
    {
        $movies = Movie::paginate(10);
        return response()->json($movies);
    }

    public function create()
    {
        $genres = Genre::all();
//        dd($genres);
        return view('movies.create', compact('genres'));

    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'genre_id' => 'required|exists:genres,id',
        ]);

        if ($request->hasFile('poster') && $request->file('poster')->isValid()) {
            $imagePath = $request->file('poster')->store('posters');
        } else {

            $imagePath = 'posters/images.jpg';
        }

        $movie = new Movie();
        $movie->title = $validatedData['title'];
        $movie->poster_link = $imagePath;
        $movie->publication_status = false;
        $movie->save();

        $movieId = $movie->id;

        $movieGenre = new MovieGenre();
        $movieGenre->movie_id = $movieId;
        $movieGenre->genre_id = $validatedData['genre_id'];
        $movieGenre->save();

        return redirect()->route('movies.index')->with('success', 'Фільм успішно створено.');

    }
    public function edit($id)
    {
        $genres = Genre::all();
        $movie = Movie::find($id);
        return view('movies.edit', compact('movie','genres'));

    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'poster' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $movie->update([
            'title' => $request->title,
        ]);

        if ($request->hasFile('poster')) {
            $imagePath = $request->file('poster')->store('posters');
            Storage::delete($movie->poster_link);
            $movie->poster_link = $imagePath;
        }

        $movie->save();

        // Оновлення зв'язаної таблиці MovieGenre
        $movieGenre = MovieGenre::where('movie_id', $movie->id)->first();
        $movieGenre->update([
            'genre_id' => $request->genre_id,
        ]);

        return redirect()->route('movies.index')->with('success', 'Фільм успішно відредаговано.');
    }

    public function publish($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->publication_status = true;
        $movie->save();

        return redirect()->route('movies.index')->with('success', 'Фільм успішно опубліковано.');
    }

    public function destroy($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return redirect()->route('movies.index')->with('error', 'Фільм не знайдено.');
        }

        $movie->genres()->detach();

        if ($movie->delete()) {
            return redirect()->route('movies.index')->with('success', 'Фільм успішно видалено.');
        } else {
            return redirect()->route('movies.index')->with('error', 'Не вдалося видалити фільм.');
        }
    }


    public function showJson($id)
    {
        $movie = Movie::findOrFail($id);
        return response()->json($movie);
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.show', ['movie' => $movie]);
    }

}

