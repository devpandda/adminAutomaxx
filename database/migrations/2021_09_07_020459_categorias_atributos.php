<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoriasAtributos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias_atributos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idCategoria');
            $table->unsignedBigInteger('idAtributo');
            $table->timestamps();

            $table->foreign('idCategoria')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('idAtributo')->references('id')->on('atributos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias_atributos');
    }
}
