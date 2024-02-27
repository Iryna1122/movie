<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    public function show(Genre $genre)
    {
        $films = $genre->films()->paginate(10);
        return view('genres.show', compact('genre', 'films'));
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_genres' => 'required|string|max:255',
        ]);

        Genre::create([
            'name_genres' => $validatedData['name_genres'],
        ]);

        return redirect()->route('genres.index')->with('success', 'Жанр успішно створено.');
    }


    public function edit($id)
    {
        $genre = Genre::find($id);
        return view('genres.edit', compact('genre'));

    }

    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        $request->validate([
            'name_genres' => 'required|string|max:255',
        ]);

        $genre->update([
            'name_genres' => $request->name_genres,
        ]);

        return redirect()->route('genres.index')->with('success', 'Жанр успішно відредаговано.');
    }

    public function destroy($id)
    {
        $genre = Genre::find($id);
        if($genre)
        {
              if ($genre->delete()) {
            return redirect()->route('genres.index')->with('success', 'Жанр успішно видалено.');
        } else {
            return redirect()->route('genres.index')->with('error', 'Не вдалося видалити жанр.');
        }
        }else{
            return redirect() ->route('genres.index')->with('error','Жанр не знайдено');
        }
    }
}
