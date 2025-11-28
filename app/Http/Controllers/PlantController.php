<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;

class PlantController extends Controller
{

    public function index()
    {
        $plants = Plant::where('user_id', auth()->id())->get();
        return view("plants.index", compact("plants"));
    }


    public function create()
    {
        return view("plants.create");
    }


    public function store(Request $request)
    {
            $validated = $request->validate([
        'culture' => 'required|string'
        ]);

        $validated['user_id'] = auth()->id();

        Plant::create($validated);

        return redirect()->route("plants.index")->with('success', 'Planta cadastrada com sucesso!');
    }


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
        $plant = Plant::findOrFail($id);

        return view("plants.edit", compact("plant"));
    }


    public function update(Request $request, string $id)
    {
        $plant = Plant::findOrFail($id);

        $plant->update($request->all());    
        
        return redirect()->route("plants.index")->with('success', 'Planta alterada com sucesso!');        
    }


    public function destroy(string $id)
    {
        $plant = Plant::findOrFail($id);

        $plant->delete();
        
        return redirect()->route("plants.index")->with('success', 'Planta excluída com sucesso!'); 
    }
}
