<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Harvest;

class HarvestController extends Controller
{

    public function index()
    {
        $harvests = Harvest::all();
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
            'culture' => 'required|string|exists:plants,culture',
            'time_harvest' => 'required|string',
            'weight_harvest' => 'required|numeric',
        ]);


        \App\Models\Harvest::create($request->all());

        return redirect()->route('harvests.index');
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
