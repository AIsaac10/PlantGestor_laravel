<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fertilizer;
use App\Models\Plant;

class FertilizerController extends Controller
{

    public function index()
    {
        $fertilizers = Fertilizer::with('plant')->where('user_id', auth()->id())->get();
        return view("fertilizers.index", compact("fertilizers"));
    }


    public function create()
    {
        $plants = \App\Models\Plant::where('user_id', auth()->id())->get();
        return view('fertilizers.create', compact('plants'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'plant_id' => 'required|integer|exists:plants,id',
            'fertilizer' => 'required|string',
            'time_fertilizer' => 'required|date',
            'weight_fertilizer' => 'required|numeric',
        ]);

        $validated['user_id'] = auth()->id();

        Fertilizer::create($validated);

        return redirect()->route('fertilizers.index')->with('success', 'Fertilizante cadastrado com sucesso!');
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
