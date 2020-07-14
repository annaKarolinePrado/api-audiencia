<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ato', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero'); 
            $table->integer('tipo');
            $table->integer('naturezaTextoJuridico');
            $table->date('dataCriacao');
            $table->date('dataVigorar');
            $table->date('dataRevogar');
            $table->date('dataSancao');
            $table->date('dataPublicacao');
            $table->integer('numeroDiarioOficial');
            $table->integer('fonteDivulgacao');
            $table->string('ementa');
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
