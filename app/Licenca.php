<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licenca extends Model
{
    /**
	* @var String
	*/
	protected $primaryKey = "licencaID";
	/**
	* @var String
	*/
	protected $kljuc;
	/**
	* @var String
	*/
	protected $podjetje;
	/**
	* @var String
	*/
	protected $tip;

	protected $table = 'licenca';
}