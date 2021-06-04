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
        <li>ocena: </li>
        <!-- Rating -->
        Average Rating : <span id='avgrating_{{ $shop->id }}'>{{ $shop->averageRating }}</span>
        <select class='rating' id='rating_{{ $shop->id }}' data-id='rating_{{ $shop->id }}' data-url='{{ route('shop.rating', $shop->id)}}'>
            <option value="1" >1</option>
            <option value="2" >2</option>
            <option value="3" >3</option>
            <option value="4" >4</option>
            <option value="5" >5</option>
        </select> 
        Users rated: <span id='usersRated_{{ $shop->id }}'>{{ $shop->usersRated() }}</span>
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

    @if ($shop->comments->count() > 0)
    <p>Komentarze: </p>
    <ol>
        @foreach ($shop->comments as $comment) 
        <li>{{ $comment->user->name }}: {{ $comment->body }}</li>
        @endforeach
    </ol>
    @else
    <p>Brak komentarzy: </p>
    @endif

    @auth
        <form method="POST" action="{{ route('comment.store', $shop->id) }}">
            @csrf
            <label for="comment">Write Comment:</label>
            <textarea class="form-control {{ $errors->has('text') ? ' is-invalid' : '' }}" rows="2" id="comment" name="body"></textarea>
            <button type="submit" class="btn btn-secondary">Comment</button>
        </form>
    @else
        <a rel="" href="{{ route('login') }}" target="_parent" class="">Zaloguj się, aby dodać komentarz</a>
    @endif
@endsection

@section('js-files')
    <script src="{{ mix('/js/vote-rate.js') }}"></script>
@endsection