<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <header class="bg-green-500 flex justify-between p-3 items-center">
        <div class="flex items-center space-x-2">
            <h1 class="text-2xl pr-6 text-white">PlantGestor</h1>

            <a class="bg-gray-800 hover:bg-gray-900 text-white text-sm px-3 py-1 rounded transition" href="{{ route('plants.index') }}">Plantas</a>
            <a class="bg-gray-800 hover:bg-gray-900 text-white text-sm px-3 py-1 rounded transition" href="{{ route('harvests.index') }}">Colheitas</a>
            <a class="bg-gray-800 hover:bg-gray-900 text-white text-sm px-3 py-1 rounded transition" href="{{ route('fertilizers.index') }}">Fertilizantes</a>
            <a class="bg-gray-800 hover:bg-gray-900 text-white text-sm px-3 py-1 rounded transition" href="{{ route('profits.index') }}">Lucros</a>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-white bg-red-500 px-3 py-1 rounded hover:bg-red-600">
                Logout
            </button>
        </form>
    </header>

    <div class="flex items-center">
        <div class="p-5 pr-95">
            <a class=" inline-block bg-gray-800 hover:bg-gray-900 text-white text-sm px-5 py-3 rounded transition" href="{{ route('fertilizers.create') }}">Criar novo Cadastro</a>
        </div>

        @if (session('success'))
        <div id="alert-message" class="bg-green-100 text-green-800 border border-green-300 px-4 py-2 rounded-md shadow-sm font-medium transition-opacity duration-500">
            {{ session('success') }}
        </div>

        <script>

            setTimeout(() => {
                const alert = document.getElementById('alert-message');
                if (alert) {
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }
            }, 3000);
        </script>
        @endif
        
    </div>



<div class="overflow-x-auto flex items-center justify-center">
    <table class="w-[1200px] min-w-[1000px] max-w-full border border-gray-200 rounded-lg shadow-sm overflow-hidden">
        <thead class="bg-green-600 text-white">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold w-1/5">Nome da Cultura</th>
                <th class="px-6 py-3 text-left text-sm font-semibold w-1/5">Nome do fertilizante</th>
                <th class="px-6 py-3 text-left text-sm font-semibold w-1/5">Data de fertilização</th>
                <th class="px-6 py-3 text-left text-sm font-semibold w-1/5">Quantidade de fertilizante</th>
                <th class="px-6 py-3 text-left text-sm font-semibold w-1/5">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fertilizers as $fertilizer)
                <tr class="odd:bg-white even:bg-gray-100">
                    <td class="px-6 py-3 border-t border-gray-200 text-gray-700">{{ $fertilizer->plant->culture }}</td>
                    <td class="px-6 py-3 border-t border-gray-200 text-gray-700">{{ $fertilizer->fertilizer }}</td>
                    <td class="px-6 py-3 border-t border-gray-200 text-gray-700">{{ $fertilizer->time_fertilizer_formatted }}</td>
                    <td class="px-6 py-3 border-t border-gray-200 text-gray-700">{{ $fertilizer->weight_fertilizer }}</td>
                    <td class="px-6 py-3 border-t border-gray-200 space-x-2">
                        <a class="inline-block bg-gray-800 hover:bg-gray-900 text-white text-sm px-3 py-1 rounded transition" href="{{ route('fertilizers.edit', $fertilizer->id) }}">Editar</a> 

                        <form action="{{ route('fertilizers.destroy', $fertilizer->id) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este registro?')">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1 rounded transition">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>