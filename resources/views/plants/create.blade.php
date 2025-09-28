<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastro de Plantas</h1>

    <form action="" method="post">
        @csrf
        <label for="culture">cultura</label>
        <input type="text" name="culture">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>