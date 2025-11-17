<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Fertilizantes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm">
        <h1 class="text-xl font-semibold text-gray-800 mb-4 text-center">
            Cadastro de Fertilizantes
        </h1>

        <form action="{{ route('fertilizers.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>

                <label for="plant_id" class="block text-gray-700 font-medium mb-1">Planta:</label>
                <select name="plant_id" required>
                    @foreach($plants as $plant)
                        <option value="{{ $plant->id }}">{{ $plant->culture }}</option>
                    @endforeach
                </select>

                

                <label for="fertilizer" class="block text-gray-700 font-medium mb-1">
                    Fertilizante:
                </label>
                <input type="text" id="fertilizer" name="fertilizer" required
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-800">


                <label for="time_fertilizer" class="block text-gray-700 font-medium mb-1">
                    Data da Fertilização:
                </label>
                <input type="text" id="time_fertilizer" name="time_fertilizer" required
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-800">


                <label for="weight_fertilizer" class="block text-gray-700 font-medium mb-1">
                    Peso do Fertilizante:
                </label>
                <input type="number" step="0.01" id="weight_fertilizer" name="weight_fertilizer" required
                class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-800">
            </div>

            <button type="submit"
                class="w-full bg-gray-800 hover:bg-gray-900 text-white font-medium py-2 rounded-md transition">
                Envia
