@extends('layouts.app')

@section('content')
    <h1>Редагувати жанр</h1>

    <form method="POST" action="{{ route('genres.update', $genre->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Назва жанру:</label>
            <input type="text" name="name_genres" id="name" class="form-control" required value="{{$genre->name_genres}}">
        </div>

        <button type="submit" class="btn btn-primary">Зберегти</button>
    </form>
@endsection
