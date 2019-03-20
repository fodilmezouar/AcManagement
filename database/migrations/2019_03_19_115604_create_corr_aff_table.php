<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrAffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corr_affs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('delais')->nullable();
            $table->integer('ecartNote')->nullable();
            $table->integer('exam_id')->unsigned();
            $table-> foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');

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
        Schema::dropIfExists('corr_affs');
    }
}
