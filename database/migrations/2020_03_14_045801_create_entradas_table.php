<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ativo_id')->unsigned()->default(1);
            $table->enum('trader', ['call', 'put']);
            $table->integer('time')->default(1);
            $table->date('data');
            $table->time('hora');
            $table->timestamps();
            $table->foreign('ativo_id')->references('id')->on('ativos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}
