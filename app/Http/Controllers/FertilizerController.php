<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fertilizer;
use App\Models\Plant;

class FertilizerController extends Controller
{

    public function index()
    {
        $fertilizers = Fertilizer::all();
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
            'culture' => 'required|string|exists:plants,culture',
            'time_fertilizer' => 'required|string',
            'weight_fertilizer' => 'required|numeric',
        ]);


        Fertilizer::create($request->only(['culture','fertilizer','time_fertilizer','weight_fertilizer'
]));

        return redirect()->route('fertilizers.index')->with('success', 'Colheita cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
