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

    <form action="{{route('plants.store')}}" method="post">
        @csrf
        <label for="culture">Cultura:</label>
        <input type="text" name="culture" required>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>