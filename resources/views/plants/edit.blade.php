<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('plants.update', $plant->id ) }}" method="post">
        @method("put")
        @csrf
        
        <label for="culture">Editar Cultura</label>
        <input type="text" name="culture" value="{{ $plant->culture }}">

        <input type="submit">




    </form>
</body>
</html>