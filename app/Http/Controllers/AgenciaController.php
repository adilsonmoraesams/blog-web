<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use Illuminate\Http\Request;

class AgenciaController extends Controller
{

    public function index(Request $request)
    {
        $query = Agencia::query();

        if ($request->has('filtrar')) {
            $query->where('nome', 'LIKE', '%' . $request->filtrar . '%');
        }

        $agencias = $query->latest()->paginate(5);

        return view('agencia.agencia-index')
            ->with('agencias', $agencias);
    }


    public function create()
    {
        return view('agencia.agencia-create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'fone' => 'required'
        ]);

        try {

            Agencia::create($request->all());

            return redirect()->route('agencia.index')
                ->with('success', 'Agência cadastrada sucesso!');
        } catch (\Exception $e) {
            // do task when error
            echo $e->getMessage();   // insert query
        }
    }


    public function show(Agencia $agencia)
    {
        return view('agencia.agencia-show')
            ->with('agencia', $agencia);
    }


    public function edit(Agencia $agencia)
    {
        return view('agencia.agencia-edit')
            ->with('agencia', $agencia);
    }


    public function update(Request $request, Agencia $agencia)
    {
        $request->validate([
            'nome' => 'required',
            'fone' => 'required'
        ]);

        $agencia->update($request->all());

        return redirect()->route('agencia.index')
            ->with('success', 'Agência alterada com sucesso!');
    }


    public function destroy(Agencia $agencia )
    {
        $agencia->delete();

        return redirect()->route('agencia.index')
            ->with('success', 'Agência excluída com sucesso!');
    }

}
