<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusPrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_prizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id', 'bp_game_id')->references('id')->on('games')->onDelete('restrict');
            $table->integer('status')->default(\App\Enums\PrizeStatus::Free);
            $table->unsignedBigInteger('cash_prize_id')->nullable();
            $table->foreign('cash_prize_id', 'bp_cash_prize_id')->references('id')->on('cash_prizes')->onDelete('restrict');
            $table->integer('sum');
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
        Schema::dropIfExists('bonus_prizes');
    }
}
