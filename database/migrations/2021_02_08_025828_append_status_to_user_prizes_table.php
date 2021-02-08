<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppendStatusToUserPrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_prizes', function (Blueprint $table) {
            $table->integer('status')->default(\App\Enums\UserPrizeStatus::Awarded);
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
            $table->dropColumn('status');
        });
    }
}
