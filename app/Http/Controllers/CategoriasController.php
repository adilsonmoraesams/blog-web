<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoriasController extends Controller
{

    public function index(Request $request)
    {
        $query = Categoria::query();

        if ($request->has('filtrar')) {
            $query->where('titulo', 'LIKE', '%' . $request->filtrar . '%');
        }

        $categorias = $query->latest()->paginate(5);

        return view('categorias.categoria-index')
            ->with('categorias', $categorias);
    }


    public function create()
    {
        return view('categorias.categoria-create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required'
        ]);

        try {

            Categoria::create($request->all());

            return redirect()->route('categorias.index')
                ->with('success', 'Categoria cadastrada sucesso!');
        } catch (\Exception $e) {
            // do task when error
            echo $e->getMessage();   // insert query
        }
    }


    public function show(Categoria $categoria )
    {
        return view('categorias.categoria-show', compact('categoria'));
    }



    public function edit(Categoria $categoria )
    {
        return view('categorias.categoria-edit', compact('categoria'));
    }


    public function update(Request $request, Categoria $categoria )
    {
        $request->validate([
            'titulo' => 'required'
        ]);

        $categoria ->update($request->all());

        return redirect()->route('categorias.index')
            ->with('success', 'Usuário alterado com sucesso!');
    }

    public function destroy(Categoria $categoria )
    {
        $categoria ->delete();

        return redirect()->route('categorias.index')
            ->with('success', 'Usuário excluído com sucesso!');
    }
}
