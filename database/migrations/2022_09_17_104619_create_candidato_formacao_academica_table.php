<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatoFormacaoAcademicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidato_formacao_academica', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('candidato_id');
            $table->string('instituicao');
            $table->date('data_inicio');
            $table->date('data_termino');
            $table->text('descricao');

            $table->foreign('candidato_id')->references('id')->on('candidatos');
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
        Schema::dropIfExists('candidato_formacao_academica');
    }
}
