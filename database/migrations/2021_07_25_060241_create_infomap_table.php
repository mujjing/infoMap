<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfomapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Address')->nullable()->comment('주소');
            $table->string('Location')->nullable()->comment('위치명');
            $table->double('Latitude')->unsigned()->nullable()->comment('위도');
            $table->double('Longitude')->unsigned()->nullable()->comment('경도');
            $table->string('note')->nullable()->comment('노트');
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
        Schema::dropIfExists('map');
    }
}
