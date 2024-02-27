@extends('layouts.app')

@section('content')
    <h1>Створити новий жанр</h1>

    <form method="POST" action="{{ route('genres.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Назва жанру:</label>
            <input type="text" name="name_genres" id="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Створити</button>
    </form>
@endsection
