<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppendGameIdToUserPrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_prizes', function (Blueprint $table) {
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id', 'up_game_id')->references('id')->on('games')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_prizes', function (Blueprint $table) {
            $table->dropColumn('game_id');
        });
    }
}
