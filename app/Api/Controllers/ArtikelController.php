<?php
namespace App\Api\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Artikel;
use App\kategorija;

class ArtikelController extends BaseController {
	public function lista() {
		$artikli = Artikel::all();

		return $this->response->array($artikli->toArray());
	}

	public function listByCategory () {
		$artikel = new Artikel();
		return $this->hasMany('App\Kategorija');
	}

	public function create (Request $request) {

		// $this->validate($request, [
		// 	'naziv'=>'required|max:50',
		// 	'kategorija'=>'required',
		// 	'merska_enota'=>'required',
		// 	'sifra'=>'required',
		// 	'cena_brez_ddv'=>'required',
		// 	'cena'=>'required',
		// 	'vprasaj_za_ceno'=>'required',
		// 	'vprasaj_za_kolicino'=>'required',
		// 	'za_prodajo'=>'required',
		// ]);

		// if(count($errors) > 0) {
		// 	return $errors;
		// }
		//return $request;
		$artikel = new Artikel();

		$artikel->naziv = $request->name;
		$artikel->kategorija = $request->category;
		$artikel->merska_enota = $request->unit;
		$artikel->sifra = $request->code;
		$artikel->cena_brez_ddv = $request->priceTaxless;
		$artikel->cena = $request->price;
		$artikel->ddv = $request->taxrate;
		$artikel->vprasaj_za_ceno = $request->askForPrice;
		$artikel->vprasaj_za_kolicino = $request->askForQuantity;
		$artikel->za_prodajo = $request->forSale;

		try {
			$artikel->save();
		} catch (Exception $e) {
			return $e;
		}
		
		return $artikel;
	}
}
