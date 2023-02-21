<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>

<body>

    @php
        function activeMenu($url)
        {
            return request()->is($url) ? 'active' : '';
        }
    @endphp
    <div class="container" id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Messages Site</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ activeMenu('/') }} {{ activeMenu('home') }}">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item {{ activeMenu('messages/create') }}">
                        <a class="nav-link" href="{{ route('messages.create') }}">Contactame</a>
                    </li>
                    <li class="nav-item {{ activeMenu('saludos*') }}">
                        <a class="nav-link" href="{{ route('saludos') }}">Saludos</a>
                    </li>
                    @if (auth()->check())
                        <li class="nav-item {{ activeMenu('messages') }}">
                            <a class="nav-link" href="{{ route('messages.index') }}">Mensajes</a>
                        </li>
                        @if (auth()->user()->hasRole(['admin', 'estudiante']))
                            <li class="nav-item {{ activeMenu('usuarios*') }}">
                                <a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a>
                            </li>
                        @endif
                    @endif
                </ul>
                <ul class="nav navbar nav-rigth">
                    @if (auth()->guest())
                        <li class="nav-item {{ activeMenu('login') }}">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="nav-link" href="/logout">Cerrar seccion</a>
                            </div>
                        </li>
                    @endif

                </ul>
            </div>
        </nav>
        @yield('content')
        <footer class="footer">Copyright {{ date('Y') }}</footer>
    </div>
    <script src="/js/app.js"></script>
</body>

</html>
