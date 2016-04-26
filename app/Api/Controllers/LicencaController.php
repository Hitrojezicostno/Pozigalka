<?php
namespace App\Api\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Licenca;

class LicencaController extends BaseController {
	public function read ($key) {

		$licenca =  Licenca::where('kljuc', $key)->findOrFail();

		return $licenca;

	}

	public function create (Request $request) {
		$licenca = new Licenca;

        $licenca->kljuc = time() + $request->podjetje;
        $licenca->podjetje = $request->podjetje;
        $licenca->tip = $request->tip;

        try {
        	$licenca->save();
        } catch (Exception $e) {
        	return $e;
        }

        return $licenca;
        
	}
}

?>