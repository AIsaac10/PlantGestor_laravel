<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Plantas</h1>
    <a href="{{route('plants.create')}}">Criar novo Cadastro</a>

    <ul>
        @foreach($plants as $plant)
            <li>{{ $plant->culture }}</li>
        @endforeach
    </ul>
</body>
</html>