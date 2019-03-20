<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corrections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('enseignant_id')->unsigned();
            $table->integer('paquet_id')->unsigned();
            $table->date('date_affectation');
            $table-> foreign('enseignant_id')->references('id')->on('users')->onDelete('cascade');
            $table-> foreign('paquet_id')->references('id')->on('paquets')->onDelete('cascade');
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
        Schema::dropIfExists('corrections');
    }
}
