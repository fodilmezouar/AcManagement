<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffectationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affectations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('enseignant_id')->unsigned();
            $table->integer('groupe_id')->unsigned();
            $table->integer('module_id')->unsigned();
            $table->string('tp')->nullable();
            $table->string('td')->nullable();
            $table->string('date_affectation',45)->nullable();
            $table->timestamps();

            $table-> foreign('enseignant_id')->references('id')->on('users')->onDelete('cascade');
            $table-> foreign('groupe_id')->references('id')->on('groupes')->onDelete('cascade');
            $table-> foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affectations');
    }
}
