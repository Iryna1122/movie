@extends('layouts.app')
@section('content')
    <div class="container ">
        <h3>{{ $movie->title }}</h3>
        <hr>
        <div>
            @if($movie->poster_link)
                <img src="{{ asset('storage/posters/' . $movie->poster_link) }}" alt="Постер фільму">
            @else
                <p>Постер фільму відсутній</p>
            @endif
            <p>Статус публікації: {{ $movie->publication_status ? 'Опубліковано' : 'Не опубліковано' }}</p>
            <div>
                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-primary">Редагувати</a>
                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Видалити</button>
                </form>
                @if (!$movie->publication_status)
                    <form action="{{ route('movies.publish', $movie->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Опублікувати</button>
                    </form>
                @endif
                <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info">Переглянути</a>
            </div>
            <br>
        </div>
@endsection
