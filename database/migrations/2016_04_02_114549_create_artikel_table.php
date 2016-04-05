<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->increments('artikelID');
            $table->integer('kategorja');
            $table->integer('merska_enota');
            $table->integer('sifra');
            $table->integer('cena_brez_ddv');
            $table->integer('cena');
            $table->float('ddv');
            $table->boolean('vprasaj_za_ceno');
            $table->boolean('vprasaj_za_kolicino');
            $table->boolean('za_prodajo');
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
        Schema::drop('artikel');
    }
}
