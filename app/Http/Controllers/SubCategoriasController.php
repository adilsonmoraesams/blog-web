<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\SubCategoria;
use Illuminate\Http\Request;

class SubCategoriasController extends Controller
{


    public function index(Categoria $categoria, Request $request)
    {

        $query = SubCategoria::query()->where('categoria_id', $categoria->id);

        if ($request->has('filtrar')) {
            $query->where('titulo', 'LIKE', '%' . $request->filtrar . '%');
        }

        $subcategorias = $query->latest()->paginate(5);

        return view('subcategorias.subcategoria-index')
            ->with('categoria', $categoria)
            ->with('subcategorias', $subcategorias);
    }



    public function create(Categoria $categoria)
    {
        return view('subcategorias.subcategoria-create')
            ->with('categoria', $categoria);
    }



    public function store(Request $request, Categoria $categoria)
    {
        $request->validate([
            'titulo' => 'required'
        ]);

        try {

            $categoria->subcategorias()->create([
                'titulo' => $request->titulo,
                'situacao' => true
            ]);


            return redirect()->route('subcategorias.index', $categoria->id)
                ->with('success', 'Categoria cadastrada sucesso!');
        } catch (\Exception $e) {
            // do task when error
            echo $e->getMessage();   // insert query
        }
    }


    public function show(SubCategoria $subCategoria)
    {
        //
    }


    public function edit(Categoria $categoria, SubCategoria $subcategoria )
    {
        return view('subcategorias.subcategoria-edit')
                ->with('subcategoria', $subcategoria)
                ->with('categoria', $categoria);;
    }


    public function update(Request $request, Categoria $categoria,  SubCategoria $subcategoria)
    {
        $request->validate([
            'titulo' => 'required'
        ]);

        $subcategoria->update($request->all());

        return redirect()->route('subcategorias.index', $categoria->id)
            ->with('success', 'Subcategoria alterada com sucesso!');

    }


    public function destroy(Categoria $categoria, SubCategoria $subcategoria )
    {
        $subcategoria->delete();

        return redirect()->route('subcategorias.index', $categoria->id)
            ->with('success', 'Usuário excluído com sucesso!');
    }
}
