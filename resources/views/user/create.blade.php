@extends('base')

@section('title', 'Nová čerpací stanice')
@section('descripton', 'Tvorba nové čerpací stanice')

@section('content')
        <h3>Tvorba čerpací stanice</h3>

        <form action="{{ route('gasStation.store') }}" method="POST">
            @csrf

            <div class="form-group w-25">
                <label for="company_id">Společnost</label>
                <select name="company_id" id="company_id" class="form-select">
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group pt-2 w-25">
                <label for="street">Ulice</label>
                <input type="text" name="street" id="street" class="form-control">
            </div>

            <div class="form-group pt-2 w-25">
                <label for="city">Město</label>
                <input type="text" name="city" id="city" class="form-control">
            </div>

            <div class="form-group pt-2 w-25">
                <label for="priceDiesel">Cena nafty</label>
                <input type="number" step=".1" name="priceDiesel" id="priceDiesel" class="form-control">
            </div>

            <div class="form-group pt-2 w-25">
                <label for="priceDieselSpecial">Cena prémiové nafty</label>
                <input type="number" step=".1" name="priceDieselSpecial" id="priceDieselSpecial" class="form-control">
            </div>

            <div class="form-group pt-2 w-25">
                <label for="pricePetrol">Cena benzínu</label>
                <input type="number" step=".1" name="pricePetrol" id="pricePetrol" class="form-control">
            </div>

            <div class="form-group pt-2 w-25">
                <label for="pricePetrolSpecial">Cena prémiového benzínu</label>
                <input type="number" step=".1" name="pricePetrolSpecial" id="pricePetrolSpecial" class="form-control">
            </div>

            <div class="form-group pt-2 w-25">
                <label for="priceCNG">Cena CNG</label>
                <input type="number" step=".1" name="priceCNG" id="priceCNG" class="form-control">
            </div>

            <div class="form-group pt-2 w-25">
                <label for="priceLPG">Cena LPG</label>
                <input type="number" step=".1" name="priceLPG" id="priceLPG" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary bg-dark mt-2">Vytvořit</button>

        </form>

@endsection
