<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
    <body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">
        <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm">
            <h1 class="text-xl font-semibold text-gray-800 mb-4 text-center">Cadastro de Plantas</h1>

            <form class="space-y-4" action="{{ route('harvests.store') }}" method="POST">
                @csrf

                <label for="culture" class="block text-gray-700 font-medium mb-1">Planta:</label>
                <select name="culture" id="culture" required onchange="updateCulture()">
                    @foreach($plants as $plant)
                        <option value="{{ $plant->culture }}">{{ $plant->culture }}</option>
                    @endforeach
                </select>

                <label for="time_harvest" class="block text-gray-700 font-medium mb-1">Horário da Colheita:</label>
                <input type="text" name="time_harvest" id="time_harvest" required class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-800">

                <label for="weight_harvest" class="block text-gray-700 font-medium mb-1">Peso:</label>
                <input type="number" step="0.01" name="weight_harvest" id="weight_harvest" required class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-800">

                <input type="submit" value="Cadastrar" class="w-full bg-gray-800 hover:bg-gray-900 text-white font-medium py-2 rounded-md transition">
            </form>
        </div>
        <a class="inline-block  hover:text-gray-500 text-bg-gray-800 text-sm px-3 py-1 rounded transition" href="{{ route('harvests.index') }}">Retornar</a>
    </body>
</html>