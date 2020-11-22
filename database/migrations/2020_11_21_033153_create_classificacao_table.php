<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassificacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classificacao', function (Blueprint $table) {
            $table->id();
            $table->integer('posicao');
            $table->string('clube', 50)->unique();
            $table->integer('pontos');
            $table->integer('jogos_disputados');
            $table->integer('vitorias');
            $table->integer('empates');
            $table->integer('derrotas');
            $table->integer('gols_pro');
            $table->integer('gols_contra');
            $table->integer('saldo_gol');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classificacao');
    }
}
