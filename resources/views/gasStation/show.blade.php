@extends('base')

@section('title', $company->name)
@section('description', '')

@section('content')

    <h1>{{ $company->name }}</h1>
    {!! $gasStation->street !!}
    <br>
    {!! $gasStation->city !!}

    <table class="table table-bordered table-responsive-md table-striped">
        <thead>
            <tr>
                <th>Cena benzínu</th>
                <th>Cena prémiového benzínu</th>
                <th>Cena nafty</th>
                <th>Cena prémiové nafty</th>
                <th>Cena LPG</th>
                <th>Cena CNG</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $gasStation->pricePetrol }}</td>
                <td>{{ $gasStation->pricePetrolSpecial }}</td>
                <td>{{ $gasStation->priceDiesel }}</td>
                <td>{{ $gasStation->priceDieselSpecial }}</td>
                <td>{{ $gasStation->priceLPG }}</td>
                <td>{{ $gasStation->priceCNG }}</td>
            </tr>
        </tbody>


    </table>


@endsection
