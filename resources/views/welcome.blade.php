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
                <a href="#">
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
                <a href="#">
                    {{ $gasStationCheapestDiesel->street }}
                    <br>
                    {{ $gasStationCheapestDiesel->city }}
                </a>
            </div>
        </div>
    </div>

{{--    <h1>{{ $company->name }}</h1>--}}
{{--    {!! $gasStation->street !!}--}}
{{--    <br>--}}
{{--    {!! $gasStation->city !!}--}}

{{--    <table class="table table-bordered table-responsive-md table-striped">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Cena benzínu</th>--}}
{{--            <th>Cena prémiového benzínu</th>--}}
{{--            <th>Cena nafty</th>--}}
{{--            <th>Cena prémiové nafty</th>--}}
{{--            <th>Cena LPG</th>--}}
{{--            <th>Cena CNG</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        <tr>--}}
{{--            <td>{{ $gasStation->pricePetrol }}</td>--}}
{{--            <td>{{ $gasStation->pricePetrolSpecial }}</td>--}}
{{--            <td>{{ $gasStation->priceDiesel }}</td>--}}
{{--            <td>{{ $gasStation->priceDieselSpecial }}</td>--}}
{{--            <td>{{ $gasStation->priceLPG }}</td>--}}
{{--            <td>{{ $gasStation->priceCNG }}</td>--}}
{{--        </tr>--}}
{{--        </tbody>--}}


{{--    </table>--}}


@endsection
