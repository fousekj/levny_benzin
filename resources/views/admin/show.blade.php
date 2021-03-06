@extends('admin.admin_base')

@section('title', $company->name)
@section('description', '')

@section('content')

    <h1>{{ $company->name }}</h1>
    <div class="">
        <a href="https://www.google.com/maps/search/?api=1&query={{$gasStation->street}} {{$gasStation->city}} {{$company->name}}"
           target="_blank">
            {!! $gasStation->street !!}
            <br>
            {!! $gasStation->city !!}
        </a>
    </div>

    <a href="{{ route('admin.edit', ['id' => $gasStation->id]) }}" class="btn btn-primary mt-1 mb-1">Aktualizovat
        ceny</a>
    <a href="#" class="btn btn-danger" onclick="document.getElementById('gasStation-delete').submit();">Odstranit</a>

    <form action="{{ route('gasStation.delete', ['id' => $gasStation->id]) }}" method="POST"
          id="gasStation-delete" class="d-none">
        @csrf
        @method('DELETE')
    </form>

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
            <td>{{ $gasStation->pricePetrol }}</td>
            <td>{{ $gasStation->pricePetrolSpecial }}</td>
            <td>{{ $gasStation->priceDiesel }}</td>
            <td>{{ $gasStation->priceDieselSpecial }}</td>
            <td>{{ $gasStation->priceLPG }}</td>
            <td>{{ $gasStation->priceCNG }}</td>
            <td>{{$gasStation->updated_at->diffForHumans()}}</td>
        </tr>
        </tbody>


    </table>


@endsection
