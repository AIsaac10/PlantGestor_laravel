<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <h1>Cadastro de Plantas</h1>

    <form action="{{route('harvests.store')}}" method="post">
        @csrf
        <input type="text" value="{{ $plant->id }}">
        <label for="tempoColheita">Tempo de Colheita:</label>
        <input type="date" name="tempoColheita" required> 
        <label for="tempoColheita">Tempo de Colheita:</label>
        <input type="date" name="tempoColheita" required> 
        <input type="submit" value="Enviar">
    </form>
</body>
</html>