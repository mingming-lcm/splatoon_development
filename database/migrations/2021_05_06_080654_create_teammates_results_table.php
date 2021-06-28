<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeammatesResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teammates_results', function (Blueprint $table) {
            $table->id();
            $table->string('result_id');
            $table->string('battle_number');
            $table->string('team');
            $table->string('player_name');
            $table->string('kill_count');
            $table->string('assist_count');
            $table->string('death_count');
            $table->string('special_count');
            $table->string('game_paint_point');
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
        Schema::dropIfExists('teammates_results');
    }
}
