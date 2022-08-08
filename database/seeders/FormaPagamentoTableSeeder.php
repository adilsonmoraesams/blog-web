<?php

namespace Database\Seeders;

use App\Models\FormaPagamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormaPagamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        FormaPagamento::create(
            [ 'descricao' => "PIX" ]
        );
        FormaPagamento::create(
            [ 'descricao' => "TED/DOC" ]
        );
        FormaPagamento::create(
            [ 'descricao' => "Cartão Parcelado" ]
        );
        FormaPagamento::create(
            [ 'descricao' => "Cartão Débito" ]
        );
        FormaPagamento::create(
            [ 'descricao' => "Boleto" ]
        );
    }

}
