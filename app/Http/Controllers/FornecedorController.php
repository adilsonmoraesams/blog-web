<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;


class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Fornecedor::query();

        if ($request->has('filtrar')) {
            $query->where('nome', 'LIKE', '%' . $request->filtrar . '%');
        }

        $fornecedores = $query->latest()->paginate(5);

        return view('fornecedor.fornecedor-index')
            ->with('fornecedores', $fornecedores);
    }


    public function create()
    {
        return view('fornecedor.fornecedor-create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required'
        ]);

        try {

            Fornecedor::create($request->all());

            return redirect()->route('fornecedor.index')
                ->with('success', 'Fornecedor cadastrada sucesso!');
        } catch (\Exception $e) {
            // do task when error
            echo $e->getMessage();   // insert query
        }
    }


    public function show(Fornecedor $fornecedor)
    {
        dd($fornecedor->id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Fornecedor $fornecedor)
    {
        return view('fornecedor.fornecedor-edit')
            ->with('fornecedor', $fornecedor);
    }

    public function update(Request $request, Fornecedor $fornecedor)
    {

        $request->validate([
            'nome' => 'required'
        ]);

        $fornecedor->update($request->all());

        return redirect()->route('fornecedor.index')
            ->with('success', 'Fornecedor alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */

    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();

        return redirect()->route('fornecedor.index')
            ->with('success', 'Fornecedor excluído com sucesso!');
    }
}
