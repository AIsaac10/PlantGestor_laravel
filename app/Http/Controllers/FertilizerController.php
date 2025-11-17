<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fertilizer;
use App\Models\Plant;

class FertilizerController extends Controller
{

    public function index()
    {
        $fertilizers = \App\Models\Fertilizer::with('plant')->get();
        return view("fertilizers.index", compact("fertilizers"));
    }


    public function create()
    {
        $plants = \App\Models\Plant::all();
        return view('fertilizers.create', compact('plants'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'plant_id' => 'required|integer|exists:plants,id',
            'time_fertilizer' => 'required|date',
            'weight_fertilizer' => 'required|numeric',
        ]);


        Fertilizer::create($request->only(['plant_id','fertilizer','time_fertilizer','weight_fertilizer'
]));

        return redirect()->route('fertilizers.index')->with('success', 'Colheita cadastrada com sucesso!');
    }


    public function show(string $id)
    {
        
    }


    public function edit(string $id)
    {
        $fertilizers = Fertilizer::findOrFail($id);
        $plants = Plant::all();
        return view("fertilizers.edit", compact("fertilizers"),  compact('plants'));
    }


    public function update(Request $request, string $id)
    {
        $fertilizer = Fertilizer::findOrFail($id);

        $fertilizer->update($request->all());

        return redirect()->route("fertilizers.index")->with('success', 'Colheita alterada com sucesso!');
    }


    public function destroy(string $id)
    {
        $fertilizer = Fertilizer::findOrFail($id);

        $fertilizer->delete();
        
        return redirect()->route("fertilizers.index")->with('success', 'Colheita excluída com sucesso!'); 
    }
}
