<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('descricao');
            $table->integer('anoIni');
            $table->integer('anoFim');
            $table->unsignedBigInteger('idMontadora');
            $table->unsignedBigInteger('idLinha');
            $table->timestamps();

            $table->foreign('idMontadora')->references('id')->on('montadoras')->onDelete('cascade');
            $table->foreign('idLinha')->references('id')->on('linhas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modelos');
    }
}
