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
        <h1>Colheita</h1>
        <a id="linkCreate" href="{{ route('plants.index') }}">Plantas</a>
    </header>
    
    <a class="btnEdit" href="{{ route('harvests.create') }}">Criar Colheita</a>



    <div id="container">
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Colheita</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($harvests as $harvest)
                    <tr>
                        <td>
                            {{ $harvest->culture }} 
                        </td>
                        <td>
                            {{ $harvest->time_harvest }} 
                        </td>
                        <td>
                            {{ $harvest->weight_harvest }} 
                        </td>
                        <td>
                            <a class="btnEdit" href="{{ route('harvests.edit', $harvest->id) }}">Editar</a> 
                            
                            
                            <form action="{{ route('harvests.destroy', $harvest->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Tem certeza que deseja excluir este registro?')">
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