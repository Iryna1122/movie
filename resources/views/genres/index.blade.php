@extends('layouts.app')

@section('content')
    <div class="container ">
        <h2>Жанри фільмів:</h2><hr>
    <ul>
        @foreach ($genres as $genre)
            <li>
                {{ $genre->name_genres }}
                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Видалити</button>
                </form>
                <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-primary">Редагувати</a>
            </li><br>
        @endforeach
    </ul>


    </div>
@endsection
