<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('affectation_id')->unsigned();
            $table->string('jour')->nullable();
            $table->string('heureDebut')->nullable();
            $table->string('heureFin')->nullable();
            $table->string('type',10)->nullable();
            $table-> foreign('affectation_id')->references('id')->on('affectations');
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
        Schema::dropIfExists('seances');
    }
}
