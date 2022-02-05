<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clashes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clashes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('home_gols');
            $table->integer('home_team')->unsigned();
            $table->foreign('home_team')->references('id')->on('teams');

            $table->integer('away_team')->unsigned();
            $table->foreign('away_team')->references('id')->on('teams');
            $table->integer('away_gols');


            $table->integer('division_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('brasileirao');
            
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
        Schema::drop('clashes');
    }
}
