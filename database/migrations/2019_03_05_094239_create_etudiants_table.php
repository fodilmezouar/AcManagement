<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero',100);
            $table->string('nom',30);
            $table->string('prenom',30);
            $table->date('naissance');
            $table->integer('groupe_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('etudiants', function (Blueprint $table) {
            $table->foreign('groupe_id')
            ->references('id')->on('groupes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
