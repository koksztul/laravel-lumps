@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <form action="{{ route('shop.create') }}" method="POST" enctype="multipart/form-data">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Dodaj lumpa</h1>
        @csrf
        <label>Nazwa lumpeksu:</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br>
        <label>Województwo:</label><br>
        <select id="voivodship" name="voivodship" value="{{ old('voivodship') }}">
            <option value="podlaskie">podlaskie</option>
            <option value="podkarpackie">podkarpackie</option>
            <option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
            <option value="malopolskie">malopolskie</option>
            <option value="warminsko-mazurskie">warminsko-mazurskie</option>
            <option value="zachodniopomorskie">zachodniopomorskie</option>
            <option value="dolnoslaskie">dolnoslaskie</option>
            <option value="slaskie">slaskie</option>
            <option value="lubelskie">lubelskie</option>
            <option value="lubuskie">lubuskie</option>
            <option value="wielkopolskie">wielkopolskie</option>
            <option value="swietokrzyskie">swietokrzyskie</option>
            <option value="opolskie">opolskie</option>
            <option value="lodzkie">lodzkie</option>
            <option value="mazowieckie">mazowieckie</option>
        </select><br>
        <label>Miasto:</label><br>
        <input type="text" id="city_search" data-url="{{ route('cities.getCites') }}" name="city" value="{{ old('city') }}"><br>
        <label>Adres:</label><br>
        <input type="text" name="address" value="{{ old('address') }}"><br>
        <label>kontakt:</label><br>
        <input type="text" name="contact" value="{{ old('contact') }}"><br>
        <label>Strona www:</label><br>
        <input type="text" name="website" value="{{ old('website') }}"><br>
        <label>rodaj zakupów:</label><br>
        <select name="type_of_purchase" value="{{ old('type_of_purchase') }}">
            <option value="kg">kg</option>
            <option value="wycena">wycena</option>
            <option value="both">oba</option>
        </select><br>
        <label>dzień dostawy:</label><br>
        <select name="day_of_delivery" value="{{ old('day_of_delivery') }}">
            <option value="poniedziałek">Poniedziałek</option>
            <option value="wtorek">Wtorek</option>
            <option value="środa">Środa</option>
            <option value="czwartek">Czwartek</option>
            <option value="piątek">Piątek</option>
            <option value="sobota">Sobota</option>
            <option value="niedziela">Niedziela</option>
        </select><br>
        <label>płatność gotówka:</label><br>
        <input type="checkbox" name="cash" value="1" {{ old('cash') ? 'checked="checked"' : '' }}><br>
        <label>platność kartą:</label><br>
        <input type="checkbox" name="card" value="1" {{ old('card') ? 'checked="checked"' : '' }}><br>
        Godziny otwarcia<br>
        <label>Poniedziałek:</label><br>
        <input type="text" name="open_hrs_mo" value="{{ old('open_hrs_mo') }}"><br>
        <label>Wtorek:</label><br>
        <input type="text" name="open_hrs_tu" value="{{ old('open_hrs_tu') }}"><br>
        <label>Środa:</label><br>
        <input type="text" name="open_hrs_we" value="{{ old('open_hrs_we') }}"><br>
        <label>Czwartek:</label><br>
        <input type="text" name="open_hrs_th" value="{{ old('open_hrs_th') }}"><br>
        <label>Piątek:</label><br>
        <input type="text" name="open_hrs_fr" value="{{ old('open_hrs_fr') }}"><br>
        <label>Sobota:</label><br>
        <input type="text" name="open_hrs_sa" value="{{ old('open_hrs_sa') }}"><br>
        <label>Niedziela:</label><br>
        <input type="text" name="open_hrs_sn" value="{{ old('open_hrs_sn') }}"><br>
        <label>Zdjęcia:</label><br>
        <input type="file" name="images[]" multiple><br>
        <label>Opis:</label><br>
        <textarea name="information" id="" cols="30" rows="10">{{ old('information') }}</textarea><br>
        <input type="submit" value="Submit">
      </form>
</div>
@endsection

@section('js-files')
    <script src="{{ mix('/js/cityautocomplete.js') }}"></script>
@endsection