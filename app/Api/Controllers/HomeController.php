<?php
namespace App\Api\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Artikel;

class HomeController extends BaseController {
	public function index() {
		$artikel = new Artikel;

        $artikel->name = $request->name;

        $artikel->save();
	}
}

?>