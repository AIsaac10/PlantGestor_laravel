<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFertilizerRequest;
use App\Http\Requests\StoreFertilizerRequest;
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


    public function store(StoreFertilizerRequest $request)
    {
        $validated = $request->validated();
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


    public function update(UpdateFertilizerRequest $request, string $id)
    {
        $fertilizer = Fertilizer::findOrFail($id);

        $fertilizer->update($request->validated());

        return redirect()->route("fertilizers.index")->with('success', 'Fertilizante atualizado com sucesso!');
    }


    public function destroy(string $id)
    {
        $fertilizer = Fertilizer::findOrFail($id);

        $fertilizer->delete();
        
        return redirect()->route("fertilizers.index")->with('success', 'Colheita excluída com sucesso!'); 
    }
}
