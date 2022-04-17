<!DOCTYPE html>
<html lang="cs-CZ">
<head>
    <meta charset="utf-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="description" content="@yield('description')"/>
    <title>@yield('title', env('APP_NAME'))</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet"/>

    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body>

<nav class="container">
    {{--    <a class="navbar-brand m-2" href="{{ url('') }}">Logo</a>--}}
    {{--    <div class="collapse navbar-collapse container-fluid" id="navbarNav">--}}
    {{--        <ul class="navbar-nav ">--}}
    {{--            <li class="nav-item">--}}
    {{--                <a class="nav-link" href="{{ url('') }}">Domů</a>--}}
    {{--            </li>--}}
    {{--            <li class="nav-item">--}}
    {{--                <a class="nav-link" href="{{ route('gasStation.index') }}">Seznam čerpacích stanic</a>--}}
    {{--            </li>--}}
    {{--            <li class="nav-item">--}}
    {{--                <a class="nav-link" href="{{ route('contact.show') }}">Kontakt</a>--}}
    {{--            </li>--}}
    {{--        </ul>--}}

    {{--    </div>--}}

    {{--    @auth--}}
    {{--        <a class="navbar-text w-50" href="#" onclick="preventDefault(); document.getElementById('logout-form').submit()">Odhlásit se</a>--}}
    {{--        <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">--}}
    {{--            @csrf--}}
    {{--        </form>--}}
    {{--    @else--}}
    {{--        <a class="navbar-text d-flex justify-content-end p-2 text-decoration-none" href="{{ route('login') }}">Přihlášení</a>--}}
    {{--        <a class="navbar-text d-flex justify-content-end p-2 text-decoration-none" href="{{ route('register') }}">Registrace</a>--}}
    {{--    @endauth--}}


    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="{{ url('') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            Logo
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ url('') }}" class="nav-link px-2 link-dark">Domů</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Seznam čerpacích stanic</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Kontakt</a></li>
        </ul>


        @auth
            <div class="col-md-3 text-end">
                <a type="button" class="btn btn-outline-primary me-2" href="{{ url('') }}"
                        onclick="preventDefault(); document.getElementById('logout-form').submit();">Odhlásit se
                </a>
                <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">
                    @csrf
                </form>
            </div>
        @else
            <div class="col-md-3 text-end">
                <button type="button" href="{{ route('login') }}" class="btn btn-outline-primary me-2">Přihlásit
                    se
                </button>
                <button type="button" href="{{ route('register') }}" class="btn btn-primary">Regstrovat se
                </button>
            </div>
        @endauth
    </header>
</nav>

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="p-lg-5">
        @yield('content')
    </div>
    <footer class="pt-4 my-md-5 border-top">
        <p>
            Levný Benzín
        </p>
    </footer>
</div>

@stack('scripts')
</body>
</html>
