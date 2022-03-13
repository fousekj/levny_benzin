@extends('base')

@section('title', $company->name)
@section('description', '')

@section('content')
    <h1>{{ $company->name }}</h1>
    {!! $gasStation->street !!}
    <br>
    {!! $gasStation->city !!}
@endsection
