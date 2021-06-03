@extends('layouts.app')

@section('content')
    @can('manage-shop', $shop)
    <a href="{{ route('shop.edit', [$shop->city->voivodship->name, $shop->city->name, $shop->id]) }}">Edytuj</a>
    @endcan
    <h1>Nazwa lumpeksa: {{ $shop->name }} </h1>
    <ol>
        <li>Adres: {{ $shop->address }}</li>
        <li>kontakt: {{ $shop->contact ? $shop->contact : 'brak' }}</li>
        <li>strona: {!! $shop->website ? '<a href="'. $shop->website .'"> '. $shop->website .'</a>' : 'brak' !!}</li>
        <li>ocena: {{ $shop->ratio ? $shop->ratio : 'brak ocen'}}</li>
        <li>rodaj zakupów: {{ $shop->type_of_purchase === 'both' ? 'wycena i kg' : $shop->type_of_purchase}}</li>
        <li>dzień dostawy: {{ $shop->day_of_delivery }}</li>
        <li>płatnośc gotówka: {{ $shop->cash ? 'dostępna' : 'brak' }}</li>
        <li>płatnośc kartą: {{ $shop->card ? 'dostępna' : 'brak' }}</li>
        <li>Godziny otwarcia:</li>
            <ul>
                <li>Poniedziałek: {{ $shop->open_hrs_mo ? $shop->open_hrs_mo : 'brak' }}</li>
                <li>Wtorek: {{ $shop->open_hrs_tu ? $shop->open_hrs_tu : 'brak'}}</li>
                <li>Środa: {{ $shop->open_hrs_we ? $shop->open_hrs_we : 'brak'}}</li>
                <li>Czwartek: {{ $shop->open_hrs_th ? $shop->open_hrs_th : 'brak'}}</li>
                <li>Piątek {{ $shop->open_hrs_fr ? $shop->open_hrs_fr : 'brak'}}</li>
                <li>Sobota; {{ $shop->open_hrs_sa ? $shop->open_hrs_sa : 'brak' }}</li>
                <li>Niedziela: {{ $shop->open_hrs_sn ? $shop->open_hrs_sn : 'brak' }}</li>
            </ul>
    </ol>
    @if ($shop->images->count() > 0)
    <p>Zdjęcia: </p>
        @foreach ($shop->images as $image) 
            <img src="{{ $image->getFormattedUrlAttribute() }}" alt="" width="420" height="360">
        @endforeach
    @else
    <p>Brak zdjęć: </p>
    @endif
    <p>Opis: {{ $shop->information ? $shop->information : 'brak'}}</p>
@endsection