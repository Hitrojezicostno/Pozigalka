<?php
namespace App\Api\Controllers;

use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Kategorija;

class KategorijaController extends BaseController {
	public function listk() {
		$kategorije = Kategorija::all();

		return $this->response->array($kategorije->toArray());
	}

	public function create (Request $request) {
		$validator = Validator::make($request->all(), [
			'company' => 'required',
			'name' => 'required',
			'is_root' => 'required',
		]);

		if ($validator->fails()) {
			return $validator->messages();
		}

		$kategorija = new Kategorija();

		$kategorija->podjetjeID = $request->company;
		$kategorija->naziv = $request->name;
		$kategorija->je_krovna = $request->is_root;

		$kategorija->save();

		return $kategorija;
	}
}