<?php

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
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->string('discriminacao');
            $table->date('dataVencimento');
            $table->date('dataQuitacao')->nullable(true);
            $table->char('tipoConta'); // R - Conta Receber, P - Conta a Pagar
            $table->integer('situacao')->default(0); // 0 - Pendente, 1 - Pago Parcial, 2 - Quitado
            $table->double('valor');
            $table->text('observacao')->nullable(true);
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
        Schema::dropIfExists('contas');
    }
};
