<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;

class PlantController extends Controller
{

    public function index()
    {
        $plants = Plant::all();
        return view("plants.index", compact("plants"));
    }


    public function create()
    {
        return view("plants.create");
    }


    public function store(Request $request)
    {
        Plant::create($request->all());

        return redirect()->route("plants.index");
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
