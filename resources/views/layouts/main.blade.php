<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) 
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('main.index') }}">Main</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.index') }}">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about.index') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact.index') }}">Contacts</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        @yield('content')
    </div>
</body>
</html>