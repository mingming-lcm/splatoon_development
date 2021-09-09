<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerWeaponsStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_weapons_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('player_id');
            $table->string('weapon_id');
            $table->string('win_count');
            $table->string('loss_count');
            $table->string('total_paint_point');
            $table->string('win_meter');
            $table->string('max_win_meter');
            $table->string('last_use_time');
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
        Schema::dropIfExists('player_weapons_statuses');
    }
}
