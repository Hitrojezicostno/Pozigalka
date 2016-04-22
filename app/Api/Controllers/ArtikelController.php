<?php
namespace App\Api\Controllers;

use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Artikel;
use App\Kategorija;
use App\Podjetje;

class ArtikelController extends BaseController {
	public function lista() {
		$artikli = Artikel::all();

		return $this->response->array($artikli->toArray());
	}

	public function listByCategory () {
		$kategorija = new Kategorija();
		$artikli = $kategorija->izdelki;
		return $artikli;
	}

	public function create (Request $request) {

		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'category' => 'required',
			'unit' => 'required',
			'code' => 'required',
			'priceTaxless' => 'required',
			'price' => 'required',
			'taxrate' => 'required',
			'askForPrice' => 'required',
			'askForQuantity' => 'required',
			'forSale' => 'required',
		]);

		if ($validator->fails()) {
			return $validator->messages();
		}

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
