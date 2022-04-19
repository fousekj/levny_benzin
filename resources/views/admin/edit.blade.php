@extends('admin.admin_base')

@section('title', 'Aktualizace cen')
@section('description', 'Aktualizece cen')

@section('content')
    <h3>Aktualizace informací o této čerpací stanici</h3>
    <h5>{{ $gasStation->company->name }}</h5>
    <h5>{{ $gasStation->street }} {{ $gasStation->city }}</h5>

    <form action="{{ route('gasStation.edit', ['id' => $gasStation->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group pt-2 w-25">
            <label for="priceDiesel">Nová cena nafty</label>
            <input type="number" step=".1" name="priceDiesel" id="priceDiesel" class="form-control" placeholder="{{ $gasStation->priceDiesel }}">
        </div>

        <div class="form-group pt-2 w-25">
            <label for="priceDieselSpecial">Nová cena prémiové nafty</label>
            <input type="number" step=".1" name="priceDieselSpecial" id="priceDieselSpecial" class="form-control" placeholder="{{ $gasStation->priceDieselSpecial }}">
        </div>

        <div class="form-group pt-2 w-25">
            <label for="pricePetrol">Nová cena benzínu</label>
            <input type="number" step=".1" name="pricePetrol" id="pricePetrol" class="form-control" placeholder="{{ $gasStation->pricePetrol }}">
        </div>

        <div class="form-group pt-2 w-25">
            <label for="pricePetrolSpecial">Nová cena prémiového bnezínu</label>
            <input type="number" step=".1" name="pricePetrolSpecial" id="pricePetrolSpecial" class="form-control" placeholder="{{ $gasStation->pricePetrolSpecial }}">
        </div>

        <div class="form-group pt-2 w-25">
            <label for="priceCNG">Nová cena CNG</label>
            <input type="number" step=".1" name="priceCNG" id="priceCNG" class="form-control" placeholder="{{ $gasStation->priceCNG }}">
        </div>

        <div class="form-group pt-2 w-25">
            <label for="priceLPG">Nová cena LPG</label>
            <input type="number" step=".1" name="priceLPG" id="priceLPG" class="form-control" placeholder="{{ $gasStation->priceLPG }}">
        </div>

        <button type="submit" class="btn btn-primary bg-dark mt-2">Aktualizovat</button>

    </form>
@endsection
