<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMartigailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('martigails', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('trade_id')->unsigned()->default(1);
            $table->time('hora_compra')->nullable();
            $table->time('hora')->nullable();
            $table->float('preco_compra', 8,2)->nullable();
            $table->float('preco_venda', 8,8)->nullable();
            $table->float('valor', 8,2)->default(2);
            $table->enum('type_status',[
                'À Executar',
                'Não Executado',
                'Cancelado',
                'Cancelado Pelo Usuário',
                'Executado'
            ])->default('À Executar');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('trade_id')->references('id')->on('trades')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('martigails');
    }
}
