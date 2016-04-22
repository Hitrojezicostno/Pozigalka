<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Podjetje extends Model
{
    /**
	* @var String
	*/
	protected $primaryKey = "podjetjeID";
	/**
	* @var String
	*/
    protected $naziv;
	/**
	* @var String
	*/
    protected $naslov;
	/**
	* @var Integer
	*/
    protected $posta;
	/**
	* @var String
	*/
    protected $kraj;
	/**
	* @var Integer
	*/
    protected $maticna_stevilka;
	/**
	* @var Integer
	*/
    protected $davna_stevilka;
	/**
	* @var Boolean
	*/
    protected $zavezanec_ddv;
	/**
	* @var String
	*/
    protected $eposta;
	/**
	* @var Boolean
	*/
    protected $aktiviran;

    protected $table = 'podjetje';

    public function kategorije () {
        return $this->hasManyThrough('App\Artikel', 'App\Kategorija', 'podjetjeID', 'kategorija')->where('kategorija.podjetjeIdD', 1);
    }

    public function artilki () {
    	return $this->join('kategorija', 'podjetjeID', '=', 'kategorija.podjetjeID')->get();
    }
}
