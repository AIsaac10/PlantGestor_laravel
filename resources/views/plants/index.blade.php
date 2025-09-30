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
            <li>{{ $plant->culture }} | <a href="{{ route('plants.edit', $plant->id) }}">Editar</a></a></li>
        @endforeach
    </ul>
</body>
</html>