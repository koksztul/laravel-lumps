@extends('layouts.app')

@section('content')
    <h1>Moje sklepy </h1>
    <h3>Lista sklepów: </h5>
    <ol>
        @foreach ($shops as $shop)
        <li><a href="{{ route('shop.show', [$shop->city->voivodship->name, $shop->city->name, $shop->id]) }}">{{$shop->name}}</a></li>
        @endforeach
    </ol>
@endsection