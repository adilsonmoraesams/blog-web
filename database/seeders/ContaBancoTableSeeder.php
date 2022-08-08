<?php

namespace Database\Seeders;

use App\Models\ContaBanco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContaBancoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContaBanco::create([
            'banco' => "Banco do Brasil",
            'cod_banco' => "001",
            'agencia' => "2764-2",
            'conta' => "74673-8"
        ]);

        ContaBanco::create([
            'banco' => "Stone Pagamentos S.A.",
            'cod_banco' => "197",
            'agencia' => "001",
            'conta' => "853208-7"
        ]);
    }
}
