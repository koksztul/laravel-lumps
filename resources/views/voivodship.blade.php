<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
    </head>
<body>
    <ol>
        @foreach ($voivodships as $voivodship)
        <li>{{ $voivodship->name }}</li>
        @endforeach
    </ol>
</body>
</html>