<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPrizeHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_prize_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prize_id');
            $table->foreign('prize_id', 'uph_prize_id')->references('id')->on('user_prizes')->onDelete('cascade');
            $table->integer('status')->default(\App\Enums\UserPrizeStatus::Awarded);
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
        Schema::dropIfExists('user_prize_history');
    }
}
