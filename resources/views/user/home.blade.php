@extends('user.user_base')

@section('title', 'Welcome page')
@section('description', 'Welcome page')

@section('content')

    @if(session('verified'))
        <div class="alert alert-success">E-mailová adresa byla úspěšně ověřená</div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md align-content-center">
                <h2 class="h2">
                    Nejlevnějsí benzín User
                </h2>
                <div class="h3">
                    {{ sprintf('%.2f', $gasStationCheapestPetrol->pricePetrol) }}
                </div>
                <a href="{{ route('user.show', ['id' => $gasStationCheapestPetrol->id]) }}">
                    {{ $gasStationCheapestPetrol->street }}
                    <br>
                    {{ $gasStationCheapestPetrol->city }}
                </a>
            </div>
            <div class="col-md align-content-center">
                <h2 class="h2">
                    Nejlevnější nafta
                </h2>
                <div class="h3">
                    {{ sprintf('%.2f', $gasStationCheapestDiesel->priceDiesel) }}
                </div>
                <a href="{{ route('user.show', ['id' => $gasStationCheapestDiesel->id]) }}">
                    {{ $gasStationCheapestDiesel->street }}
                    <br>
                    {{ $gasStationCheapestDiesel->city }}
                </a>
            </div>
        </div>
    </div>




@endsection
