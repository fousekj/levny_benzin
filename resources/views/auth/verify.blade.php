@extends('welcome.base')

@section('title', 'Ověření emailu')
@section('description', 'Ověřte svou emailovou adresu')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ověřte svou emailovou adresu</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Odkaz pro ověření byl odeslán na vaší emailovou adresu.
                        </div>
                    @endif

                    Předtím než budete pokračovat, se prosím ujistěte, že jste odkaz neobdrželi.
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Klikněte zde, pro zaslání nového emailu</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
