@extends('welcome.base')

@section('title', 'Seznam čerpacích stanic')
@section('description', 'Výpis všech čerpacích stanic')

@section('content')
    <table class="table table-responsive table-striped table-bordered">
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
            <th>Naposledy aktualizováno</th>
{{--            <th>Editace</th>--}}
        </tr>
        </thead>
        <tbody>
        @forelse ($gasStations as $gasStation)
            <tr>
                <td>{{ $gasStation->company->name }}</td>
                <td>
                    <a href="{{ route('welcome.show', ['id' => $gasStation->id]) }}">
                        {{ $gasStation->street }}, {{ $gasStation->city }}
                    </a>
                </td>

                <td>{{ sprintf('%.2f', $gasStation->priceDiesel) }}</td>
                <td>{{ sprintf('%.2f', $gasStation->priceDieselSpecial) }}</td>
                <td>{{ sprintf('%.2f', $gasStation->pricePetrol) }}</td>
                <td>{{ sprintf('%.2f', $gasStation->pricePetrolSpecial) }}</td>
                <td>{{ sprintf('%.2f', $gasStation->priceLPG) }}</td>
                <td>{{ sprintf('%.2f', $gasStation->priceCNG) }}</td>

                <td>{{ $gasStation->updated_at->diffForHumans() }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">
                    Zatím nejsou přidané žádné čerpací stanice.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
