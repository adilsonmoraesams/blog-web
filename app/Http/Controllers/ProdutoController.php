<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{



    public function index(Request $request)
    {
        $query = Produto::query();

        if ($request->has('filtrar')) {
            $query->where('name', 'LIKE', '%' . $request->filtrar . '%');
        }

        $produtos = $query->latest()->paginate(5);

        return view('produto.produto-index')
            ->with('produtos', $produtos);
    }


    public function create()
    {
        $fornecedores = Fornecedor::get();

        return view('produto.produto-create')
            ->with('fornecedores', $fornecedores);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'fornecedor_id' => 'required',
            'tipo' => 'required'
        ]);

        Produto::create($request->all());

        return redirect()->route('produto.index')
            ->with('success', 'Produto cadastrado com Sucesso!');
    }


    public function show(Produto $produto)
    {
        return view('produto.produto-show', compact('produto'));
    }



    public function edit(Produto $produto)
    {
        $fornecedores = Fornecedor::get();

        return view('produto.produto-edit')
            ->with('produto', $produto)
            ->with('fornecedores', $fornecedores);
    }


    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required',
            'fornecedor_id' => 'required',
            'tipo' => 'required'
        ]);

        $produto->update($request->all());

        return redirect()->route('produto.index')
            ->with('success', 'Produto alterado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produto.produto-index')
            ->with('success', 'Produto excluído com sucesso!');
    }
}
