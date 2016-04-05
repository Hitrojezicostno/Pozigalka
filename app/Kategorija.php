<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategorija extends Model {
	/**
	* @var String
	*/
	protected $primaryKey = "kategorijaID";
	/**
	* @var Integer
	*/
    protected $podjetje;
	/**
	* @var String
	*/
    protected $naziv;
	/**
	* @var Boolean
	*/
    protected $je_krovna;
	
	protected $table = 'kategorija';
}