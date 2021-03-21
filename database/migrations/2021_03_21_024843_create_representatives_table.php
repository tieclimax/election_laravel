<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representatives', function (Blueprint $table) {
            $table->increments('id', 11);
            $table->string('firstname', 255);
            $table->string('lastname', 255);
            $table->enum('edu_level', ['ม.6', 'ปวช.', 'ปวส.', 'อนุปริญญา', 'ปริญญาตรี', 'ปริญญาโท', 'ปริญญาเอก']);
            $table->integer('group_id');

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
        Schema::dropIfExists('representatives');
    }
}
