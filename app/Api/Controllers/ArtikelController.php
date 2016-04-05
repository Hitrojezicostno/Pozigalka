<?php
namespace App\Api\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Artikel;

class KategorijaController extends BaseController {
	public function listk() {
		$artikli = Artikel::all();

		return $this->response->array($artikli->toArray());
	}

	public function create (Request $request) {
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

		$artikel->save();

		return $artikel;
	}
}
