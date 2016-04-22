<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
	$api->group(['namespace' => 'App\Api\Controllers'], function ($api) {
		$api->get('/home', 'HomeController@index');

		$api->get('/articles', 'ArtikelController@lista');
		$api->get('/articles1', 'ArtikelController@companyCategories');
		$api->get('/articles/{artikelID}', 'ArtikelController@read');
		$api->post('/articles', 'ArtikelController@create');

		$api->get('/categories', 'KategorijaController@listk');
		$api->get('/categories/{categoryID}', 'KategorijaController@read');
		$api->post('/categories', 'KategorijaController@create');

		$api->get('/companies', 'PodjetjeController@listp');
		$api->post('/companies', 'PodjetjeController@create');

		$api->get('/users', 'UporabnikController@listu');
		$api->post('/users', 'UporabnikController@create');

	});
});