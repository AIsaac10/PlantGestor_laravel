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

        <form action="{{ route('harvests.store') }}" method="POST">
            @csrf

            <label for="culture">Planta:</label>
            <select name="culture" id="culture" required onchange="updateCulture()">
                @foreach($plants as $plant)
                    <option value="{{ $plant->culture }}">{{ $plant->culture }}</option>
                @endforeach
            </select>

            <label for="time_harvest">Horário da Colheita:</label>
            <input type="text" name="time_harvest" id="time_harvest" required>

            <label for="weight_harvest">Peso:</label>
            <input type="number" step="0.01" name="weight_harvest" id="weight_harvest" required>

            <input type="submit" value="Cadastrar">
        </form>
    </body>
</html>