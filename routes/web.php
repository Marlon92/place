<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register', function () {
    return view('registro');
});
Route::group(['prefix' => 'ws'], function()
{	
	Route::resource('consulta/municipios',	'TownsController');
	Route::resource('consulta/categorias',	'CategoriesController');
	Route::post('consulta/place', 			'PlacesController@seePlaces');
	Route::post('consulta/placeData', 		'PlacesController@placeData');
	Route::post('consulta/photos',			'PlacesController@photos');
	Route::resource('places',	 			'PlacesController');

});

	Route::get('datos', 'PlacesController@datosCombo');