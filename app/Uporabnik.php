<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uporabnik extends Model
{
    /**
	* @var String
	*/
	protected $primaryKey = "uporabnikID";
	/**
	* @var Integer
	*/
	protected $podjetjeID;
	/**
	* @var String
	*/
	protected $ime;
	/**
	* @var String
	*/
	protected $priimek;
	/**
	* @var Integer
	*/
	protected $davcna_stevilka;
	/**
	* @var String
	*/
	protected $uporabnisko_ime;
	/**
	* @var String
	*/
	protected $geslo;
	/**
	* @var String
	*/
	protected $tip_uporabnika;

	protected $table = 'uporabnik';
}