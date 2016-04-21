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

	public function izdelki () {
        return $this->hasMany('App\Artikel', 'kategorija');
    }

    public function kategorije () {
    	return $this->belongsTo('App\Podjetje');
    }
}