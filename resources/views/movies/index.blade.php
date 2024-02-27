@extends('layouts.app')

@section('content')
    <div class="container ">
        <h2>Кіноафіша:</h2>
        <hr>
        <ul id="movie-list">

        </ul>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const movieList = document.getElementById('movies-list');
            fetch('/movies')
                .then(response => response.json())
                .then(data => {
                    data.forEach(movie => {
                        const listItem = document.createElement('li');
                        listItem.textContent = movie.title;
                        movieList.appendChild(listItem);
                    });
                });
        });
    </script>
@endsection
