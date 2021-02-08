<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicalPrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_prizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('object_id');
            $table->foreign('object_id', 'pp_object_id')->references('id')->on('physical_objects')->onDelete('restrict');
            $table->integer('status')->default(\App\Enums\PrizeStatus::Free); //can be free, selected, converted
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
        Schema::dropIfExists('physical_prizes');
    }
}
