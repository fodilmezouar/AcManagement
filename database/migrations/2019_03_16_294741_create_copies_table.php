<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCopiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codeCopie',30);
            $table->float('noteFinal',8,2)->nullable();
            $table->float('notePre1',8,2)->nullable();
            $table->float('notePre2',8,2)->nullable();
            $table->float('notePre3',8,2)->nullable();
            $table->integer('paquetId')->unsigned();
            $table->integer('etudiantId')->unsigned();
            $table->foreign('paquetId')->references('id')->on('paquets');
            $table->foreign('etudiantId')->references('id')->on('etudiants');
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
        Schema::dropIfExists('copies');
    }
}
