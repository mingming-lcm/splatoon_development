<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerMedalsStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_medals_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('player_id');            
            $table->string('league_type');            
            $table->string('medals_type');            
            $table->integer('sort_order');            
            $table->integer('medals_count');            
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
        Schema::dropIfExists('player_medals_statuses');
    }
}
