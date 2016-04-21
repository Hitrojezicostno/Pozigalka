<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model {
	/**
	* @var String
	*/
	protected $primaryKey = "aktikelID";
	/**
	* @var String
	*/
    protected $naziv;
    /**
    * @var String
    */
    protected $sifra;
    /**
    * @var String
    */
    protected $merska_enota;
    /**
    * @var String
    */
    protected $cena_brez_ddv;
    /**
    * @var String
    */
    protected $cena;
    /**
    * @var String
    */
    protected $vprasaj_za_ceno;
    /**
    * @var String
    */
    protected $vprasaj_za_kolicino;
    /**
    * @var String
    */
    protected $za_prodajo;
    /**
    * @var Integer
    */
    protected $kategorija;

    protected $table = 'artikel';

    public function kategorija () {
        return $this->belongsTo('App\Kategorija');
    }
}
