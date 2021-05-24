<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
    </head>
<body>
    <ol>
        @foreach ($voivodships as $voivodship)  
        <li><a href="{{ route('voivodship.index', $voivodship->name) }}">{{$voivodship->name}}</a></li>
        @endforeach
    </ol>
    <ol>
        @foreach ($voivodships as $voivodship)
        <li>{{ $voivodship->name }}</li>
        <ol>
            @foreach ($voivodship->cities as $city)
            <li>{{ $city->name }}</li>
            <ul>
                @foreach ($city->shops as $shop)
                <li>{{ $shop->name }}</li>
                @endforeach
            </ul>
            @endforeach
        </ol>
        @endforeach
    </ol>
</body>
</html>