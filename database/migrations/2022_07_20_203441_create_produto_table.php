<?php

use App\Models\Fornecedor;
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
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150);
            $table->text('detalhes')->nullable();
            $table->text('regras')->nullable();
            $table->integer('tipo'); // 1 - milhas, 2 - fixo
            $table->double('valor')->nullable();
            $table->string('cotar', 256)->nullable();
            $table->foreignIdFor(Fornecedor::class);
            $table->boolean('ativo')->default(1);
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
        Schema::dropIfExists('produto');
    }
};
