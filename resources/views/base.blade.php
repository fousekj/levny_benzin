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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand p-2" href="{{ url('') }}">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('') }}">Domů</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('gasStation.index') }}">Seznam čerpacích stanic</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact.show') }}">Kontakt</a>
            </li>
        </ul>
    </div>
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
