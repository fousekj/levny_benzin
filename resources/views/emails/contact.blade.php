@component('mail::message')
Právě ti přišla zpráva z kontaktního formuláře

Toto je její znění:

@component('mail::panel')
{{ $message }}
@endcomponent

Díky, <br>
{{ config('app.name') }}
@endcomponent
