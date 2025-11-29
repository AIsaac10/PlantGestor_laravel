<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCostRequest;
use App\Http\Requests\UpdateCostRequest;
use App\Models\Cost;

class CostController extends Controller
{

    public function index()
    {
        $costs = Cost::where('user_id', auth()->id())->get();
        $totalCusto = $costs->sum('quantity_cost');

        return view('costs.index', compact('costs', 'totalCusto'));
    }


    public function create()
    {
        return view('costs.create');
    }


    public function store(StoreCostRequest $request)
    {
        $data = array_merge($request->validated(), ['user_id' => auth()->id()]);

        Cost::create($data);

        return redirect()->route('costs.index')->with('success', 'Custo registrado com sucesso!');
    }


    public function edit(Cost $cost)
    {
        if ($cost->user_id !== auth()->id()) {
            abort(403);
        }

        return view('costs.edit', compact('cost'));
    }


    public function update(UpdateCostRequest $request, Cost $cost)
    {
        if ($cost->user_id !== auth()->id()) {
            abort(403);
        }

        $cost->update($request->validated());

        return redirect()->route('costs.index')->with('success', 'Custo atualizado com sucesso!');
    }


    public function destroy(Cost $cost)
    {
        if ($cost->user_id !== auth()->id()) {
            abort(403);
        }

        $cost->delete();

        return redirect()->route('costs.index')->with('success', 'Custo excluído com sucesso!');
    }
}
