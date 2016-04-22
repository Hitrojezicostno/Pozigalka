<?php
namespace App\Api\Controllers;

use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Uporabnik;

class UporabnikController extends BaseController {
	public function listu() {
		
	}

	public function create (Request $request) {
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'surname' => 'required',
			'tax_number' => 'required',
			'username' => 'required',
			'password' => 'required',
			'type' => 'required',
		]);

		if ($validator->fails()) {
			return $validator->messages();
		}

		$uporabnik = new Uporabnik();

		$uporabnik->ime = $request->name;
		$uporabnik->priimek = $request->surname;
		$uporabnik->davcna_stevilka = $request->tax_number;
		$uporabnik->uporabnisko_ime = $request->username;
		$uporabnik->geslo = $request->password;
		$uporabnik->tip_uporabnika = $request->type;

		try {
			$uporabnik->save();
		} catch (Exception $e) {
			return $e;
		}
	}
}

?>