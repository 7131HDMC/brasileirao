<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Classification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classification', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('PTS')
                ->comment('Pontos acumulados');
            $table->integer('J')
                ->comment('Total de jogos/confrontos');
            $table->integer('V')
                ->comment('Total de vitórias');
            $table->integer('E')
                ->comment('Total de Empates');
            $table->integer('D')
                ->comment('Total de Derrotas');
            $table->integer('GP')
                ->comment('Total de Gols Pró');
            $table->integer('GC')
                ->comment('Total de Gols COntra');
            $table->integer('SG')
                ->comment('Saldo de Gols');
            
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams');

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
        Schema::drop('classification');
    }
}
