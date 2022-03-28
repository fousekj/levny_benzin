@extends('base')

@section('title', 'Welcome page')
@section('description', 'Welcome page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md align-content-center">
                <h2 class="h2">
                    Nejlevnějsí benzín
                </h2>
                <div class="h3">
                    {{ $gasStationCheapestPetrol->pricePetrol }}
                </div>
                <a href="{{ route('gasStation.show', ['gasStation' => $gasStationCheapestPetrol, 'company' => $gasStationCheapestPetrol->company]) }}">
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
                    {{ $gasStationCheapestDiesel->priceDiesel }}
                </div>
                <a href="{{ route('gasStation.show', ['gasStation' => $gasStationCheapestDiesel, 'company' => $gasStationCheapestDiesel->company]) }}">
                    {{ $gasStationCheapestDiesel->street }}
                    <br>
                    {{ $gasStationCheapestDiesel->city }}
                </a>
            </div>
        </div>
    </div>




@endsection
