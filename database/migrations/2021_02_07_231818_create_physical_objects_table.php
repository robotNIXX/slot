<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_objects', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->integer('amount')->default(0);
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id', 'po_game_id')->references('id')->on('games')->onDelete('restrict');
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
        Schema::dropIfExists('physical_objects');
    }
}
