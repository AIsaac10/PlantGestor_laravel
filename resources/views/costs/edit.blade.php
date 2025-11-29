<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Custo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm">
        <h1 class="text-xl font-semibold text-gray-800 mb-4 text-center">
            Editar Custo
        </h1>

        <form action="{{ route('costs.update', $cost->id) }}" method="POST" class="space-y-4">
            @method("PUT")
            @csrf

            <div>
                <label for="description_cost" class="block text-gray-700 font-medium mb-1">
                    Descrição do Custo:
                </label>
                <input 
                    type="text" 
                    id="description_cost" 
                    name="description_cost" 
                    value="{{ old('description_cost', $cost->description_cost) }}"
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-800">
            </div>

            @error('description_cost')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror

            <div>
                <label for="quantity_cost" class="block text-gray-700 font-medium mb-1">
                    Valor do Custo (R$):
                </label>
                <input 
                    type="number"
                    step="0.01"
                    id="quantity_cost" 
                    name="quantity_cost" 
                    value="{{ old('quantity_cost', $cost->quantity_cost) }}"
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-800">
            </div>

            @error('quantity_cost')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror

            <button type="submit"
                class="w-full bg-gray-800 hover:bg-gray-900 text-white font-medium py-2 rounded-md transition">
                Atualizar
            </button>
        </form>
    </div>

    <a class="inline-block hover:text-gray-500 text-gray-800 text-sm px-3 py-1 rounded transition mt-3"
       href="{{ route('costs.index') }}">
        Retornar
    </a>

</body>
</html>
