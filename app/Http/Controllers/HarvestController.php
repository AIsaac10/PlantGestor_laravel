<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Harvest;
use Illuminate\Http\Request;

class HarvestController extends Controller
{

    public function index()
    {
        $harvests = \App\Models\Harvest::with('plant')->get();
        return view("harvests.index", compact("harvests"));
    }


    public function create()
    {
        $plants = \App\Models\Plant::all();
        return view('harvests.create', compact('plants'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'plant_id' => 'required|integer|exists:plants,id',
            'time_harvest' => 'required|string',
            'weight_harvest' => 'required|numeric',
        ]);


        \App\Models\Harvest::create($request->all());

        return redirect()->route('harvests.index')->with('success', 'Colheita cadastrada com sucesso!');
    }


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
        $harvest = Harvest::findOrFail($id);
        $plants = Plant::all();
        return view("harvests.edit", compact("harvest"),  compact('plants'));
    }


    public function update(Request $request, string $id)
    {
        $harvest = Harvest::findOrFail($id);

        $harvest->update($request->all());

        return redirect()->route("harvests.index")->with('success', 'Colheita alterada com sucesso!');
    }


    public function destroy(string $id)
    {
        $harvest = Harvest::findOrFail($id);

        $harvest->delete();
        
        return redirect()->route("harvests.index")->with('success', 'Colheita excluída com sucesso!'); 
    }
}
