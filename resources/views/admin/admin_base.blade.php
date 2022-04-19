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
        <a href="{{ route('admin.home') }}"
           class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="https://cdn-icons-png.flaticon.com/512/483/483497.png" alt="logo.png" width="15%" height="15%">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{ route('admin.home') }}" class="nav-link px-2 link-dark">Domů</a></li>
            <li><a href="{{ route('admin.list') }}" class="nav-link px-2 link-dark">Seznam čerpacích stanic</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">Správa účtů</a></li>
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

    @elseif(session('message'))
        <div class="alert alert-success">
            <p>{{ session('message') }}</p>
        </div>
    @endif
    <div class="pt-1">
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
