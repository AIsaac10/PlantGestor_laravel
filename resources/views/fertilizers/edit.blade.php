<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Fertilizante</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm">
        <h1 class="text-xl font-semibold text-gray-800 mb-4 text-center">Editar Fertilizante</h1>

        <form class="space-y-4" action="{{ route('fertilizers.update', $fertilizers->id) }}" method="POST">
            @csrf
            @method("put")

            <label class="block text-gray-700 font-medium mb-1" for="culture">Planta:</label>
            <select name="plant_id" id="plant_id" required>
                @foreach($plants as $plant)
                    <option value="{{ $plant->id }}" 
                        {{ $fertilizers->plant_id == $plant->id ? 'selected' : '' }}>
                        {{ $plant->culture }}
                    </option>
                @endforeach
            </select>


            <label class="block text-gray-700 font-medium mb-1" for="fertilizer">Fertilizante:</label>
            <input type="text" name="fertilizer" id="fertilizer"
                value="{{ $fertilizers->fertilizer }}"
                required
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-800">
                
            <label class="block text-gray-700 font-medium mb-1" for="time_fertilizer">Data da Fertilização:</label>
            <input type="text" step="0.01" name="time_fertilizer" id="time_fertilizer"
                value="{{ $fertilizers->time_fertilizer }}"
                required
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-800">

            <label class="block text-gray-700 font-medium mb-1" for="weight_fertilizer">Peso do Fertilizante:</label>
            <input type="number" step="0.01" name="weight_fertilizer" id="weight_fertilizer"
                value="{{ $fertilizers->weight_fertilizer }}"
                required
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-800">

            <input type="submit" value="Salvar Alterações"
                class="w-full bg-gray-800 hover:bg-gray-900 text-white font-medium py-2 rounded-md transition">
        </form>
    </div>

    <a class="inline-block hover:text-gray-500 text-gray-800 text-sm px-3 py-1 rounded transition mt-4"
        href="{{ route('fertilizers.index') }}">
        Retornar
    </a>

</body>
</html>
