<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantas</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <header>
        <h1>PlantGestor</h1>
                <a id="linkCreate" href="{{ route('harvests.index') }}">Colheitas</a>
    </header>
    
        <a id="linkCreate" href="{{ route('plants.create') }}">Criar novo Cadastro</a>




    <div id="container">
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
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
                            
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>