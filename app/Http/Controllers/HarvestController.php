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
        return view("harvests.create");
    }


    public function store(Request $request)
    {
        Harvest::create($request->all());

        return redirect()->route("harvests.index");
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
