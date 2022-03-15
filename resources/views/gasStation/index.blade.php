@extends('base')

@section('title', 'Seznam čerpacích stanic')
@section('description', 'Výpis všech čerpacích stanic')

@section('content')
    <table class="table table-striped table-bordered table-responsive-md">
        <thead>
        <tr>
            <th>Společnost</th>
            <th>Adresa</th>
            <th>Cena nafty</th>
            <th>Cena prémiové nafty</th>
            <th>Cena benzínu</th>
            <th>Cena prémiového benzínu</th>
            <th>Cena LPG</th>
            <th>Cena CNG</th>
            <th>Editace</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($gasStations as $gasStation)
            <tr>
                <td>{{ $gasStation->company->name }}</td>
                <td>
                    <a href="{{ route('gasStation.show', ['gasStation' => $gasStation, 'company' => $gasStation->company]) }}">
                        {{ $gasStation->street }}, {{ $gasStation->city }}
                    </a>
                </td>

                <td>{{ $gasStation->priceDiesel }}</td>
                <td>{{$gasStation->priceDieselSpecial}}</td>
                <td>{{ $gasStation->pricePetrol }}</td>
                <td>{{$gasStation->pricePetrolSpecial}}</td>
                <td>{{ $gasStation->priceLPG }}</td>
                <td>{{$gasStation->priceCNG}}</td>
                <td>
                    <a href="#">Editovat</a>
                    <a href="#" >Odstranit</a>

                    <form action="{{ route('gasStation.destroy', ['gasStation' => $gasStation]) }}" method="POST" id="gasStation-delete-{{ $gasStation->id }}" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">
                    Zatím nejsou přidané žádné čerpací stanice.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <a href="#" class="btn btn-primary">
        Přidat čerpací stanici
    </a>
@endsection
