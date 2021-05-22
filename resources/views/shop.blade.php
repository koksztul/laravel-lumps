<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
    </head>
<body>
    <h1>Nazwa lumpeksa: {{ $shop->name }} </h1>
    <ol>
        <li>Adres: {{ $shop->address }}</li>
        <li>kontakt: {{ $shop->contact }}</li>
        <li>strona: <a href="{{ $shop->website }}">{{ $shop->website }}</a></li>
        <li>ocena: {{ $shop->ratio }}</li>
        <li>rodaj zakupów: {{ $shop->type_of_purchase }}</li>
        <li>dzień dostawy: {{ $shop->day_of_delivery }}</li>
        <li>płatnośc gotówka: {{ $shop->cash }}</li>
        <li>płatnośc kartą: {{ $shop->card }}</li>
        <li>Godziny otwarcia:</li>
            <ul>
                <li>Poniedziałek: {{ $shop->open_hrs_mo }}</li>
                <li>Wtorek: {{ $shop->open_hrs_tu }}</li>
                <li>Środa: {{ $shop->open_hrs_we }}</li>
                <li>Czwartek: {{ $shop->open_hrs_th }}</li>
                <li>Piątek {{ $shop->open_hrs_fr}}</li>
                <li>Sobota; {{ $shop->open_hrs_sa }}</li>
                <li>Niedziela: {{ $shop->open_hrs_sn }}</li>
            </ul>
    </ol>
    <p>Opis: {{ $shop->information }}</p>
</body>
</html>