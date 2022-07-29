<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{

    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('filtrar')) {
            $query->where('name', 'LIKE', '%' . $request->filtrar . '%');
        }

        $usuarios = $query->latest()->paginate(5);

        return view('usuarios.usuario-index')
            ->with('usuarios', $usuarios);
    }


    public function create()
    {
        return view('usuarios.usuario-create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        try {

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password,),
            ]);

            return redirect()->route('usuarios.index')
                ->with('success', 'Usuário cadastrado sucesso!');

        } catch (\Exception $e) {
            // do task when error
            echo $e->getMessage();   // insert query
        }
    }


    public function show(User $usuario)
    {
        return view('usuarios.usuario-show', compact('usuarios'));
    }



    public function edit(User $usuario)
    {
        return view('usuarios.usuario-edit')
                ->with('usuario', $usuario);;
    }


    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $usuario->update($request->all());

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuário alterado com sucesso!');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuário excluído com sucesso!');
    }
}
