<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaquetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle',30);
            $table->string('fichier',100);
            $table->integer('promotion_id')->unsigned();
            $table->integer('exam_id')->unsigned();
            $table->foreign('promotion_id')->references('id')->on('promotions');
            $table->foreign('exam_id')->references('id')->on('exams');
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
        Schema::dropIfExists('paquets');
    }
}
