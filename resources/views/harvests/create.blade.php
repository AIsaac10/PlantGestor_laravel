<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Colheitas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm">
        <h1 class="text-xl font-semibold text-gray-800 mb-4 text-center">
            Cadastro de Colheitas
        </h1>

        <form class="space-y-4" action="{{ route('harvests.store') }}" method="POST">
            @csrf

            <label class="block text-gray-700 font-medium mb-1">Planta:</label>
            <select name="plant_id" required
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-800">
                @foreach($plants as $plant)
                    <option value="{{ $plant->id }}">{{ $plant->culture }}</option>
                @endforeach
            </select>

            <label class="block text-gray-700 font-medium mb-1">Horário da Colheita:</label>
            <input type="text" name="time_harvest" required
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-800">

            <label class="block text-gray-700 font-medium mb-1">Peso da Colheita:</label>
            <input type="number" step="0.01" name="weight_harvest" required
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-800">

            <button type="submit"
                class="w-full bg-gray-800 hover:bg-gray-900 text-white font-medium py-2 rounded-md transition">
                Cadastrar
            </button>
        </form>
    </div>

    <a class="inline-block hover:text-gray-500 text-gray-800 text-sm px-3 py-1 rounded transition"
       href="{{ route('harvests.index') }}">
       Retornar
    </a>

</body>
</html>
