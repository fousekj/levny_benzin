@extends('base')

@section('title', $company->name)
@section('description', '')

@section('content')

    <h1>{{ $company->name }}</h1>
    <a class="link-primary"
       href="https://www.google.com/maps/search/?api=1&query={{$gasStation->street}} {{$gasStation->city}} {{$company->name}}"
       target="_blank">
        {!! $gasStation->street !!}
        <br>
        {!! $gasStation->city !!}
    </a>

    <h5>Pro aktualizaci cen se musíte <a href="{{ route('login') }}" class="link-primary">přihlásit</a>.</h5>

    <table class="table table-bordered table-responsive-md table-striped">
        <thead>
        <tr>
            <th>Cena benzínu</th>
            <th>Cena prémiového benzínu</th>
            <th>Cena nafty</th>
            <th>Cena prémiové nafty</th>
            <th>Cena LPG</th>
            <th>Cena CNG</th>
            <th>Naposledy aktualizováno</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ sprintf('%.2f', $gasStation->pricePetrol) }}</td>
            <td>{{ sprintf('%.2f', $gasStation->pricePetrolSpecial) }}</td>
            <td>{{ sprintf('%.2f', $gasStation->priceDiesel) }}</td>
            <td>{{ sprintf('%.2f', $gasStation->priceDieselSpecial) }}</td>
            <td>{{ sprintf('%.2f', $gasStation->priceLPG) }}</td>
            <td>{{ sprintf('%.2f', $gasStation->priceCNG) }}</td>
            <td>{{$gasStation->updated_at->diffForHumans()}}</td>
        </tr>
        </tbody>
    </table>
@endsection
