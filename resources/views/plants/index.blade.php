<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantas</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/index.css') }}"> -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="">
    <header class="bg-green-500">
        <h1>PlantGestor</h1>
        <a id="linkCreate" href="{{ route('harvests.index') }}">Colheitas</a>
    </header>
    
    <a id="linkCreate" href="{{ route('plants.create') }}">Criar novo Cadastro</a>


    @if (session('success'))
    <div id="alert-message">
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



    <div class="overflow-x-auto " >
        <table class="min-w-200 border border-gray-200 rounded-lg shadow-sm overflow-hidden">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th>Nome da Cultura</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plants as $plant)
                    <tr>
                        <td>{{ $plant->culture }}</td>

                        <td>
                            <a class="btnEdit" href="{{ route('plants.edit', $plant->id) }}">Editar</a> 
                            
                            
                            <form action="{{ route('plants.destroy', $plant->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Tem certeza que deseja excluir este registro?')">
                                @csrf
                                @method("DELETE")
                                <input class="btnDelete" type="submit" value="Excluir">
                            
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>