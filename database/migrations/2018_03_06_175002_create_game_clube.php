<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameClube extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('games_club', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clubs_id')->unsigned();
            $table->integer('game_id')->unsigned();
            
            $table->integer('gols')->unsigned();
            
            $table->foreign('clubs_id')->references('id')->on('clubs')->onDelete('cascade'); 
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade'); 
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games_club');
    }
}
