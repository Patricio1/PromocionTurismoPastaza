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

/**Route::get('/', function () {
    return view('index');
});*/
Route::get('categorias','CategoriaController@index');
Route::get('subcategorias','SubcategoriaController@index');
Route::get('subcategoriasbycategory/{idcategoria}','SubcategoriaController@getByIdCategorias');
Route::get('sitios_turisticos','SitioTuristicoController@index');
Route::get('sitios_turisticos_by_categoria/{categoria}','SitioTuristicoController@getSitiosByCategoria');
Route::get('sitios_turisticos_by_subcategoria/{subcategoria}','SitioTuristicoController@getSitiosBySubcategoria');
Route::get('sitio_turistico_by_latlng/{latitud}/{longitud}','SitioTuristicoController@getSitiosByLatLng');
Route::get('sitio_calificacion/{latitud}/{longitud}','SitioTuristicoController@getCalificacionSitio');
Route::get('servicios_sitio/{latitud}/{longitud}','SitioTuristicoController@getServiciosSitio');
Route::get('get_filtros','SitioTuristicoController@getFiltrosCalificacion');
Route::get('calificar/{idsitio}/{idfiltro}','SitioTuristicoController@guardarCalificacion');
Route::get('categoriasmascalificadas','SitioTuristicoController@getCategoriasMasCalificadas');
Route::get('sitiosmascalificados','SitioTuristicoController@getSitiosMasCalificados');
Route::get('login','SitioTuristicoController@login');
Route::get('/','SitioTuristicoController@getSitiosRecientes');
Route::get('perfiles','PerfilController@getAllPerfilesAjax');
Route::resource('admin/perfil','PerfilController');
Route::resource('admin/modulo','ModuloController');
Route::resource('admin/recurso','RecursoController');


