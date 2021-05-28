@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <form action="{{ route('shop.edit', [$shop->city->voivodship->name, $shop->city->name, $shop->id])  }}" method="POST" enctype="multipart/form-data">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Edytuj lumpa</h1>
        @csrf
        @method('PUT')
        <label>Nazwa lumpeksu:</label><br>
        <input type="text" name="name" value="{{ $shop->name }}"><br>
        <label>Województwo:</label><br>
        <select name="voivodship" value="{{ $shop->city->voivodship->name }}">
            <option value="podlaskie" {{ ($shop->city->voivodship->name) === 'podlaskie' ? ' selected' : '' }}>podlaskie</option>
            <option value="podkarpackie" {{ ($shop->city->voivodship->name) === 'podkarpackie' ? ' selected' : '' }}>podkarpackie</option>
            <option value="kujawsko-pomorskie" {{ ($shop->city->voivodship->name) === 'kujawsko-pomorskie' ? ' selected' : '' }}>kujawsko-pomorskie</option>
            <option value="malopolskie" {{ ($shop->city->voivodship->name) === 'malopolskie' ? ' selected' : '' }}>malopolskie</option>
            <option value="warminsko-mazurskie" {{ ($shop->city->voivodship->name) === 'warminsko-mazurskie' ? ' selected' : '' }}>warminsko-mazurskie</option>
            <option value="zachodniopomorskie" {{ ($shop->city->voivodship->name) === 'zachodniopomorskie' ? ' selected' : '' }}>zachodniopomorskie</option>
            <option value="dolnoslaskie" {{ ($shop->city->voivodship->name) === 'dolnoslaskie' ? ' selected' : '' }}>dolnoslaskie</option>
            <option value="slaskie" {{ ($shop->city->voivodship->name) === 'slaskie' ? ' selected' : '' }}>slaskie</option>
            <option value="lubelskie" {{ ($shop->city->voivodship->name) === 'lubelskie' ? ' selected' : '' }}>lubelskie</option>
            <option value="lubuskie" {{ ($shop->city->voivodship->name) === 'lubuskie' ? ' selected' : '' }}>lubuskie</option>
            <option value="wielkopolskie" {{ ($shop->city->voivodship->name) === 'wielkopolskie' ? ' selected' : '' }}>wielkopolskie</option>
            <option value="swietokrzyskie" {{ ($shop->city->voivodship->name) === 'swietokrzyskie' ? ' selected' : '' }}>swietokrzyskie</option>
            <option value="opolskie" {{ ($shop->city->voivodship->name) === 'opolskie' ? ' selected' : '' }}>opolskie</option>
            <option value="lodzkie" {{ ($shop->city->voivodship->name) === 'lodzkie' ? ' selected' : '' }}>lodzkie</option>
            <option value="mazowieckie" {{ ($shop->city->voivodship->name) === 'mazowieckie' ? ' selected' : '' }}>mazowieckie</option>
        </select><br>
        <label>Miasto:</label><br>
        <input type="text" name="city" value="{{ $shop->city->name }}"><br>
        <label>Adres:</label><br>
        <input type="text" name="address" value="{{ $shop->address }}"><br>
        <label>kontakt:</label><br>
        <input type="text" name="contact" value="{{ $shop->contact }}"><br>
        <label>Strona www:</label><br>
        <input type="text" name="website" value="{{ $shop->website }}"><br>
        <label>rodaj zakupów:</label><br>
        <select name="type_of_purchase" value="{{ $shop->type_of_purchase }}">
            <option value="kg" {{ ($shop->type_of_purchase) === 'kg' ? ' selected' : '' }}>kg</option>
            <option value="valuation" {{ ($shop->type_of_purchase) === 'valuation' ? ' selected' : '' }}>wycena</option>
            <option value="both" {{ $shop->type_of_purchase === 'both' ? ' selected' : '' }}>oba</option>
        </select><br>
        <label>dzień dostawy:</label><br>
        <select name="day_of_delivery" value="{{ $shop->day_of_delivery }}">
            <option value="monday"  {{ $shop->day_of_delivery === 'monday' ? ' selected' : '' }}>Poniedziałek</option>
            <option value="tuesday"  {{ $shop->day_of_delivery === 'tuesday' ? ' selected' : '' }}>Wtorek</option>
            <option value="wednesday"  {{ $shop->day_of_delivery === 'wednesday' ? ' selected' : '' }}>Środa</option>
            <option value="thursday"  {{ $shop->day_of_delivery === 'thursday' ? ' selected' : '' }}>Czwartek</option>
            <option value="friday"  {{ $shop->day_of_delivery === 'friday' ? ' selected' : '' }}>Piątek</option>
            <option value="saturday"  {{ $shop->day_of_delivery === 'saturday' ? ' selected' : '' }}>Sobota</option>
            <option value="sunday"  {{ $shop->day_of_delivery === 'sunday' ? ' selected' : '' }}>Niedziela</option>
        </select><br>
        <label>płatność gotówka:</label><br>
        <input type="checkbox" name="cash" value="1" {{ $shop->cash ? 'checked="checked"' : '' }}><br>
        <label>platność kartą:</label><br>
        <input type="checkbox" name="card" value="1" {{ $shop->card ? 'checked="checked"' : '' }}><br>
        Godziny otwarcia<br>
        <label>Poniedziałek:</label><br>
        <input type="text" name="open_hrs_mo" value="{{ $shop->open_hrs_mo }}"><br>
        <label>Wtorek:</label><br>
        <input type="text" name="open_hrs_tu" value="{{ $shop->open_hrs_tu }}"><br>
        <label>Środa:</label><br>
        <input type="text" name="open_hrs_we" value="{{ $shop->open_hrs_we }}"><br>
        <label>Czwartek:</label><br>
        <input type="text" name="open_hrs_th" value="{{ $shop->open_hrs_th }}"><br>
        <label>Piątek:</label><br>
        <input type="text" name="open_hrs_fr" value="{{ $shop->open_hrs_fr }}"><br>
        <label>Sobota:</label><br>
        <input type="text" name="open_hrs_sa" value="{{ $shop->open_hrs_sa }}"><br>
        <label>Niedziela:</label><br>
        <input type="text" name="open_hrs_sn" value="{{ $shop->open_hrs_sn }}"><br>
        @if ($shop->images->count() > 0)
        <p>Zdjęcia: </p>
            @foreach ($shop->images as $image) 
                <img src="{{ $image->getFormattedUrlAttribute() }}" alt="" width="420" height="360">
            @endforeach
        @else
        <p>Brak zdjęć: </p>
        @endif<br>
        <label>Zdjęcia:</label><br>
        <input type="file" name="images[]" multiple><br>
        <label>Opis:</label><br>
        <textarea name="information" id="" cols="30" rows="10">{{ $shop->information }}</textarea><br>
        <input type="submit" value="Submit">
      </form>
</div>
@endsection