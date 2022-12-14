<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); //cm, mm, kg
            $table->string('descricao', 30);
            $table->timestamps();
        });

        //adiciona relacionamento tabela produtos

        Schema::table('produtos', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //adiciona relacionamento tabela produto_detalhes

        Schema::table('produto_detalhes', function(Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produto_detalhes', function(Blueprint $table){
            //remover a fk
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            //remover coluna
            $table->dropColumn('unidade_id');
        });

        //remove relacionamento tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            //remover a fk
            $table->dropForeign('produtos_unidade_id_foreign');
            //remover coluna
            $table->dropColumn('unidade_id');
        });

        //remove relacionamento tabela produto_detalhes e exclui a tabela
        Schema::dropIfExists('unidades');
    }
}
