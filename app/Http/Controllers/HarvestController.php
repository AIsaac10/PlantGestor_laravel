<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Harvest;
use App\Http\Requests\StoreHarvestRequest;
use App\Http\Requests\UpdateHarvestRequest;

class HarvestController extends Controller
{

    public function index()
    {
        $harvests = \App\Models\Harvest::with('plant')->where('user_id', auth()->id())->get();
        return view("harvests.index", compact("harvests"));
    }


public function create()
    {
        $plants = \App\Models\Plant::where('user_id', auth()->id())->get();
        return view('harvests.create', compact('plants'));
    }





public function store(StoreHarvestRequest $request)
{
    Harvest::create([
        'plant_id' => $request->plant_id,
        'time_harvest' => $request->time_harvest,
        'weight_harvest' => $request->weight_harvest,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('harvests.index')->with('success', 'Colheita cadastrada com sucesso!');
}



    public function show(string $id)
    {

    }


public function edit(string $id)
{
    $harvest = Harvest::findOrFail($id);

    $plants = Plant::where('user_id', auth()->id())->get();

    return view("harvests.edit", compact("harvest", "plants"));
}



    public function update(UpdateHarvestRequest $request, Harvest $harvest)
    {
        $harvest->update($request->validated());

        return redirect()->route('harvests.index')->with('success', 'Colheita atualizada com sucesso!');
    }


    public function destroy(string $id)
    {
        $harvest = Harvest::findOrFail($id);

        $harvest->delete();
        
        return redirect()->route("harvests.index")->with('success', 'Colheita excluída com sucesso!'); 
    }
}
