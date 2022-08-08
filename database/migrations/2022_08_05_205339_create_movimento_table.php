<?php

use App\Models\Contas;
use App\Models\FormaPagamento;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimento', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->foreignIdFor(Contas::class);
            $table->foreignIdFor(FormaPagamento::class);
            $table->string('valorPago');
            $table->string('valorTaxa');
            $table->double('valor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimento');
    }
};
