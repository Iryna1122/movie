<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

<div class="container ">
    <div class="d-flex justify-content-between align-items-center">
        <a itemprop="url" href="/" class="logo-ua" title="">
            <img itemprop="logo" src="https://kinoafisha.ua/themes/kino/images/svg/logo-ua.svg" alt="logo">
        </a>
        <div>
            <a href="/" class="btn btn-dark">HOME</a>
            <a href="{{ route('movies.create') }}" class="btn btn-dark">Створити фільм</a>
            <a href="{{ route('genres.create') }}" class="btn btn-dark">Створити жанр</a>
        </div>
    </div>


</div>
    @yield('content')


</body>
</html>
