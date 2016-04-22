<?php
namespace App\Api\Controllers;

use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Podjetje;
use App\Uporabnik;

class PodjetjeController extends BaseController {
	public function listp() {
		$podjetja = Podjetje::all();

		return $this->response->array($podjetja->toArray());
	}

	public function create (Request $request) {
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'address' => 'required',
			'place' => 'required',
			'postCode' => 'required',
			'registration_number' => 'required',
			'tax_number' => 'required',
			'vat_payer' => 'required',
			'email' => 'required',
		]);

		if ($validator->fails()) {
			return $validator->messages();
		}

		//return $request;

		$podjetje = new Podjetje();

		$podjetje->naziv = $request->name;
		$podjetje->naslov = $request->address;
		$podjetje->kraj = $request->place;
		$podjetje->posta = $request->postCode;
		$podjetje->maticna_stevilka = $request->registration_number;
		$podjetje->davcna_stevilka = $request->tax_number;
		$podjetje->zavezanec_ddv = $request->vat_payer;
		$podjetje->eposta = $request->email;
		$podjetje->aktiviran = false;

		try {
			$podjetje->save();
		} catch (Exception $e) {
			return $e;
		}

		createUser($podjetje->podjetjeID);
	}


	public function createUser ($id) {
		return $id;

		$uporabnik = new Uporabnik();

		$uporabnik->podjetjeID = 1;
		$uporabnik->ime = $podjetje->naziv;
		$uporabnik->priimek = $podjetje->naziv;
		$uporabnik->davcna_stevilka = $podjetje->davcna_stevilka;
		$uporabnik->uporabnisko_ime = 'admin';
		$uporabnik->geslo = 'admin';
		$uporabnik->tip_uporabninka = 1;

		
		try {
			$podjetje->save();
			//$uporabnik->save();
		} catch (Exception $e) {
			return $e;
		}


		return [$podjetje, $uporabnik];
		
	}
}