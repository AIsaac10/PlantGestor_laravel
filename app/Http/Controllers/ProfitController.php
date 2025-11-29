<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfitRequest;
use App\Http\Requests\UpdateProfitRequest;
use App\Models\Profit;

class ProfitController extends Controller
{

    public function index()
    {
        $profits = Profit::where('user_id', auth()->id())->get();
        return view('profits.index', compact('profits'));
    }


    public function create()
    {
        return view('profits.create');
    }


    public function store(StoreProfitRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        Profit::create($data);

        return redirect()->route('profits.index')
            ->with('success', 'Lucro registrado com sucesso!');
    }



    public function edit(string $id)
    {
        $profit = Profit::findOrFail($id);

        if ($profit->user_id !== auth()->id()) {
            abort(403);
        }

        return view('profits.edit', compact('profit'));
    }


    public function update(UpdateProfitRequest $request, Profit $profit)
    {
        $profit->update($request->validated());

        return redirect()->route('profits.index')
            ->with('success', 'Lucro atualizado com sucesso!');
    }


    public function destroy(string $id)
    {
        $profit = Profit::findOrFail($id);

        if ($profit->user_id !== auth()->id()) {
            abort(403);
        }

        $profit->delete();

        return redirect()->route('profits.index')->with('success', 'Lucro excluído com sucesso!');
    }
}

