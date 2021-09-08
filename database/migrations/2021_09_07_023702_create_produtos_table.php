<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('SKU');
            $table->string('nome');
            $table->string('descricao');
            $table->string('img');
            $table->string('codOem');
            $table->string('codBarra');
            $table->string('qtdUso');
            $table->string('ref');
            $table->string('ncm');
            $table->string('voltagem');
            $table->unsignedBigInteger('idCategoria');
            $table->timestamps();

            $table->foreign('idCategoria')->references('id')->on('categorias')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
