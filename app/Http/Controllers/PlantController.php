<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlantRequest;
use App\Http\Requests\UpdatePlantRequest;
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


    public function store(StorePlantRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        Plant::create($validated);

        return redirect()->route("plants.index")->with('success', 'Planta cadastrada com sucesso!');
    }


    public function edit(string $id)
    {
        $plant = Plant::findOrFail($id);

        return view("plants.edit", compact("plant"));
    }


    public function update(UpdatePlantRequest $request, Plant $plant)
    {
        $plant->update($request->validated());

        return redirect()->route('plants.index')->with('success', 'Planta atualizada com sucesso!');
    }


    public function destroy(string $id)
    {
        $plant = Plant::findOrFail($id);

        $plant->delete();
        
        return redirect()->route("plants.index")->with('success', 'Planta excluída com sucesso!'); 
    }
}
