@extends('user.user_base')

@section('title', 'Seznam čerpacích stanic')
@section('description', 'Výpis všech čerpacích stanic')

@section('content')
    <div class="container">
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
                <th>Editace</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($gasStations as $gasStation)
                <tr>
                    <td>{{ $gasStation->company->name }}</td>
                    <td>
                        <a href="{{ route('user.show', ['id' => $gasStation->id]) }}">
                            {{ $gasStation->street }}, {{ $gasStation->city }}
                        </a>
                    </td>

                    <td>{{ $gasStation->priceDiesel }}</td>
                    <td>{{ $gasStation->priceDieselSpecial }}</td>
                    <td>{{ $gasStation->pricePetrol }}</td>
                    <td>{{ $gasStation->pricePetrolSpecial }}</td>
                    <td>{{ $gasStation->priceLPG }}</td>
                    <td>{{ $gasStation->priceCNG }}</td>

                    <td>{{ $gasStation->updated_at->diffForHumans() }}</td>
                    <td>
                        <a href="{{ route('user.editPrices', ['id' => $gasStation->id]) }}">Aktualizovat ceny</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">
                        Zatím nejsou přidané žádné čerpací stanice.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
