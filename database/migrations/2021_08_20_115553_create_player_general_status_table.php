<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerGeneralStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_general_status', function (Blueprint $table) {
            $table->id();
            $table->string('player_id');
            $table->string('nickname');
            $table->string('player_rank');
            $table->string('star_rank');
            $table->string('player_gender');
            $table->string('player_type');
            $table->string('max_league_point_pair');
            $table->string('max_league_point_team');
            $table->string('win_count');
            $table->string('lose_count');
            $table->string('recent_disconnect_count');
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
        Schema::dropIfExists('player_general_status');
    }
}
