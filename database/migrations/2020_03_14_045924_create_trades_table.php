<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->default(1);
            $table->bigInteger('entrada_id')->unsigned()->default(1);
            $table->time('hora_compra')->nullable();
            $table->float('preco_compra')->nullable();
            $table->float('preco_venda')->nullable();
            $table->float('valor');
            $table->integer('martigale')->default(2);
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('entrada_id')->references('id')->on('entradas')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trades');
    }
}
