<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePodjetjeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podjetje', function (Blueprint $table) {
            $table->increments('podjetjeID');
            $table->string('naziv');
            $table->string('naslov');
            $table->string('kraj');
            $table->integer('posta');
            $table->integer('maticna_stevilka');
            $table->integer('davcna_stevilka');
            $table->boolean('zavezanec_ddv');
            $table->string('eposta');
            $table->boolean('aktiviran');
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
        Schema::drop('podjetje');
    }
}
