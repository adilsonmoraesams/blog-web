<?php

namespace App\Http\Controllers;

use App\Models\Contas;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Decimal;

class ContasController extends Controller
{

    public function index()
    {
        $query = Contas::query();
        $contas = $query->latest()->paginate(10);

        $saidas = Contas::where('tipoConta', 'P')->sum('valor');
        $entradas = Contas::where('tipoConta', 'R')->sum('valor');

        return view('contas.contas-index')
            ->with('contas', $contas)
            ->with('saidas', $saidas)
            ->with('entradas', $entradas);
    }



    public function create()
    {
        return view('contas.contas-create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'discriminacao' => 'required',
            'dataVencimento'  => 'required',
            'tipoConta'  => 'required',
            'valor'  => 'required'
        ]);

        $valor = $request->valor;
        $valor = str_replace( '.', '', $valor);
        $valor = str_replace( ',', '.', $valor);
        $valor = (double) $valor;

        try {

            $conta = $request->all();
            $conta = [
                'discriminacao' => $request->discriminacao,
                'dataVencimento' => $request->dataVencimento,
                'dataQuitacao' => $request->dataQuitacao,
                'tipoConta' => $request->tipoConta,
                'situacao' => 0,
                'observacao' => $request->observacao,
                'valor' => $valor
            ];

            Contas::create($conta);

            return redirect()->route('contas.index')
                ->with('success', 'Contas cadastrada sucesso!');
        } catch (\Exception $e) {
            // do task when error
            echo $e->getMessage();   // insert query
        }
    }


    public function show(Contas $contas)
    {
    }


    public function edit(Contas $contas)
    {
        return view('contas.contas-edit', compact('contas'));
    }

    public function update(Request $request, Contas $contas)
    {
        $request->validate([
            'discriminacao' => 'required',
            'dataVencimento'  => 'required',
            'tipoConta'  => 'required',
            'valor'  => 'required'
        ]);

        $contas->update($request->all());

        return redirect()->route('contas.index')
            ->with('success', 'Conta alterada com sucesso!');
    }


    public function destroy(Contas $contas)
    {
        try
        {
            $contas->delete();

            return redirect()->route('contas.index')
                ->with('success', 'Conta excluída com sucesso!');

        } catch (\Exception $e) {
            // do task when error
            echo $e->getMessage();   // insert query
        }
    }
}
