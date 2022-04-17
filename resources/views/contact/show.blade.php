@extends('welcome.base')

@section('title', 'Kontaktní formulář')
@section('description', 'Kontaktujte nás pomocí tohoto formuláře')

@section('content')


    <h1>Kontakt</h1>


    <form action="{{ route('contact.show') }}" method="POST">
        @csrf


            <div class="form-group col-md-4">
                <label for="email">Váš email</label>
                <input type="email" name="email" id="email" placeholder="vas@email.cz" class="form-control">
            </div>

            <div class="form-group col-md-auto">
                <label for="message">Vaše zpráva</label>
                <textarea name="message" id="message" rows="10" class="form-control" placeholder="Vaše zpráva"></textarea>
            </div>
        <button type="submit" class="btn btn-primary mt-2">Odeslat</button>
    </form>
@endsection
