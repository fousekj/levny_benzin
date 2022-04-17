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
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="{{ url('') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            Logo
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('home') }}" class="nav-link px-2 link-dark">Domů</a></li>
            <li><a href="{{ route('list') }}" class="nav-link px-2 link-dark">Seznam čerpacích stanic</a></li>
            <li><a href="{{ route('contact.show') }}" class="nav-link px-2 link-dark">Kontakt</a></li>
        </ul>


        @auth
            <div class="col-md-3 text-end">
                <a href="#" class="link-primary me-2">{{ Auth::user()->name }}</a>
                <a type="button" class="btn btn-outline-primary me-2" href="#"
                   onclick="document.getElementById('logout-form').submit();">Odhlásit se
                </a>
                <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">
                    @csrf
                </form>
            </div>
        @else
            <div class="col-md-3 text-end">
                <a type="button" href="{{ route('login') }}" class="btn btn-outline-primary me-2">Přihlásit
                    se
                </a>
                <a type="button" href="{{ route('register') }}" class="btn btn-primary">Regstrovat se
                </a>
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
