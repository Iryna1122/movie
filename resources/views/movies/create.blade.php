@extends('layouts.app')

@section('content')
    <div class="container ">
        <h2>Завантажити фільм:</h2><hr>

        <form method="POST" action="{{ route('movies.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Назва фільму:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="genre">Жанр фільму:</label>
                <select name="genre_id" id="genre" class="form-control" required>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name_genres }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="poster">Постер фільму:</label>
                <input type="file" name="poster" id="poster" class="form-control-file" >
            </div>
            <button type="submit" class="btn btn-primary">Створити фільм</button>
        </form>


    </div>
@endsection
