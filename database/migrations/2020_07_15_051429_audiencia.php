<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Audiencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audiencia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tema'); 
            $table->integer('ato'); 
            $table->string('situacao');
            $table->integer('equipePlanejamento');
            $table->date('dataHora');
            $table->date('dataPrimeiraConvocacao');
            $table->string('enderecoDoBeneficiado');
            $table->string('tipoAudiencia');
            $table->string('enderecoBeneficiado');
            $table->string('assunto');
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
        //
    }
}
