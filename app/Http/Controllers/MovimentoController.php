<?php

namespace App\Http\Controllers;

use App\Models\Contas;
use App\Models\Movimento;
use Illuminate\Http\Request;

class MovimentoController extends Controller
{


    public function index()
    {
        //
    }


    public function create()
    {
    }

    public function store(Contas $contas, Request $request)
    {
        try {

            // Define o valor default para a variável que contém o nome da imagem
            $nameFile = null;

            // Verifica se informou o arquivo e se é válido
            // if ($request->hasFile('comprovante') && $request->file('comprovante')->isValid()) {

            // Define finalmente o nome
            $nameFile = $request->file('comprovante')->getClientOriginalName();

            // Faz o upload:
            $upload = $request->file('comprovante')->storeAs('movimentos', $nameFile);

            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if (!$upload) {
                return redirect()
                    ->back()
                    ->with('mensagem', 'Falha ao fazer upload')
                    ->withInput();
            }

            $valorTaxa = convert_money_usa($request->valorTaxa);
            $valorPago = convert_money_usa($request->valorPago);
            $valor = $valorPago + $valorTaxa;

            $contas->movimentos()->create([
                'descricao' => $request->descricao,
                'valorPago' => $request->valorPago,
                'valorTaxa' => $request->valorTaxa,
                'valor' => $valor,
                'forma_pagamento_id' => $request->forma_pagamento_id,
                'comprovante' => $nameFile
            ]);

            // print_r($contas->movimentos()->sum('valor'));

            // return redirect()
            //     ->back()
            //     ->with('mensagem', 'Pagamento realizado com sucesso!')
            //     ->withInput();

            // erro
        } catch (\Exception $e) {
            // do task when error
            echo $e->getMessage();   // insert query
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Movimento $movimento)
    {

        $movimento->delete();
            return redirect()
                ->back()
                ->with('mensagem', 'Pagamento realizado com sucesso!')
                ->withInput();

    }
}
