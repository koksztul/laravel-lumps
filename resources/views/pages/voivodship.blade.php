@extends('layouts.app')

@section('content')
    <h1>Wojewodztwo: {{ $cities[0]->voivodship->name }}</h1>
    <h3>Lista miast: </h5>
    <ol>
        @foreach ($cities as $city)
        <li><a href="{{ route('city.index', [$city->voivodship->name, $city->name]) }}">{{$city->name}}</a></li>
        @endforeach
    </ol>
@endsection