<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostulerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postuler', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('offre_emplois')->unsigned();
            $table->integer('employe')->unsigned();
            $table->date('datepost');
            $table->timestamps();

            $table->foreign('offre_emplois')->references('id')->on('offre_emplois');
            $table->foreign('employe')->references('id')->on('employes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postuler');
    }
}
