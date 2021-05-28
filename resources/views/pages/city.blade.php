@extends('layouts.app')

@section('content')
    <h1>Miasto: {{ $shops[0]->city->name }} </h1>
    <h3>Lista sklepów: </h5>
    <ol>
        @foreach ($shops as $shop)
        <li><a href="{{ route('shop.show', [$shop->city->voivodship->name, $shop->city->name, $shop->id]) }}">{{$shop->name}}</a></li>
        @endforeach
    </ol>
@endsection