<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trades', function (Blueprint $table) {
            $table->enum('type_status',[
                'À Executar',
                'Não Executado',
                'Cancelado',
                'Cancelado Pelo Usuário',
                'Executado'
            ])->default('À Executar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('trades', function (Blueprint $table) {
            $table->dropColumn('type_status');
        });
    }
}
