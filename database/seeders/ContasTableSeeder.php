<?php

namespace Database\Seeders;

use App\Models\Contas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // EXEMPLO DE CONTAS A PAGAR
        Contas::create([
            'discriminacao' => "ENERGIA",
            'dataVencimento' => "2022-08-10",
            'dataQuitacao' => null,
            'tipoConta' => "P",
            'situacao' => 0, // 0 - Pendente, 1 - Pago Parcial, 2 - Quitado
            'valor' => 200,
            'observacao' => ""
        ]);

        Contas::create([
            'discriminacao' => "PAGAMENTO DE PASSAGEM SARAH (001)",
            'dataVencimento' => "2022-08-08",
            'dataQuitacao' => null,
            'tipoConta' => "P",// R - Conta Receber, P - Conta a Pagar
            'situacao' => 0, // 0 - Pendente, 1 - Pago Parcial, 2 - Quitado
            'valor' => 550,
            'observacao' => ""
        ]);

        // EXEMPLO DE CONTAS A RECEBER
        Contas::create([
            'discriminacao' => "RECEBIMENTO DE PASSAGEM: 001",
            'dataVencimento' => "2022-08-08",
            'dataQuitacao' => null,
            'tipoConta' => "R", //  R - Conta Receber, P - Conta a Pagar
            'situacao' => 0, // 0 - Pendente, 1 - Pago Parcial, 2 - Quitado
            'valor' => 800,
            'observacao' => ""
        ]);
    }
}
