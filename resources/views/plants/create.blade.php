<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Plantas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm">
        <h1 class="text-xl font-semibold text-gray-800 mb-4 text-center">
            Cadastro de Plantas
        </h1>

        <form action="{{ route('plants.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="culture" class="block text-gray-700 font-medium mb-1">
                    Cultura:
                </label>
                <input type="text" id="culture" name="culture" value="{{ old('culture') }}"
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500 text-gray-800">
            </div>

            @error('culture')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror

            <button type="submit"
                class="w-full bg-gray-800 hover:bg-gray-900 text-white font-medium py-2 rounded-md transition">
                Enviar
            </button>
        </form>
    </div>
    <a class="inline-block  hover:text-gray-500 text-bg-gray-800 text-sm px-3 py-1 rounded transition" href="{{ route('plants.index') }}">Retornar</a>
</body>
</html>
