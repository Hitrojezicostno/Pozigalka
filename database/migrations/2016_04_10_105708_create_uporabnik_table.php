<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUporabnikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uporabnik', function (Blueprint $table) {
            $table->increments('uporabnikID');
            $table->integer('podjetjeID');
            $table->string('ime');
            $table->string('priimek');
            $table->integer('davcna_stevilka');
            $table->string('uporabnisko_ime');
            $table->string('geslo');
            $table->integer('tip_uporabninka');
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
        Schema::drop('uporabnik');
    }
}
