<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('battle_number');
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('elapsed_time')->nullable();
            $table->string('mode');
            $table->string('rule');
            $table->string('my_team_count')->nullable();
            $table->string('other_team_count')->nullable();
            $table->string('my_team_result');
            $table->string('estimate_gachi_power')->nullable();
            $table->string('league_point')->nullable();
            $table->string('my_estimate_league_point')->nullable();
            $table->string('other_estimate_league_point')->nullable();
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
        Schema::dropIfExists('results');
    }
}
