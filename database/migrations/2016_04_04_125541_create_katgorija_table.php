<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKatgorijaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategorija', function (Blueprint $table) {
            $table->increments('kategorijaID');
            $table->integer('podjetjeID');
            $table->string('naziv');
            $table->boolean('je_krovna');
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
        Schema::drop('kategorija');
    }
}
