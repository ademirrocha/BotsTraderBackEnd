<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandlesticksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candlesticks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ativo_id')->unsigned()->default(1);
            $table->date('data');
            $table->time('hora');
            $table->float('open', 11,8)->nullable();
            $table->float('close', 11,8)->nullable();
            $table->float('high', 11,8)->nullable();
            $table->float('low', 11,8)->nullable();
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
        Schema::dropIfExists('candlesticks');
    }
}
