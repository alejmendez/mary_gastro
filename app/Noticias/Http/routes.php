<?php

Route::group(['middleware' => 'web', 'prefix' =>  Config::get('admin.prefix').'/Noticias', 'namespace' => 'marygastro\\Modules\Noticias\Http\Controllers'], function()
{
    Route::get('/',                                 'NoticiasController@index');
    Route::post('guardar',                          'NoticiasController@guardar');
    Route::get('buscar/{id}',                       'NoticiasController@buscar');
    Route::put('guardar/{id}',                      'NoticiasController@guardar');
    Route::get('datatable',                         'NoticiasController@datatable');
    Route::delete('eliminar/{id}',                  'NoticiasController@eliminar');
    Route::post('restaurar/{id}',                   'NoticiasController@restaurar');
    Route::delete('destruir/{id}',                  'NoticiasController@destruir');
    Route::post('subir',                            'NoticiasController@subir');
    Route::delete('busc/eliminarimagen/{id}',       'NoticiasController@eliminarImagen');

    Route::group(['prefix' => 'definiciones/categorias'], function() {
		Route::get('/', 				'CategoriasController@index');
		Route::get('buscar/{id}', 		'CategoriasController@buscar');
        Route::get('nuevo', 		    'CategoriasController@nuevo');
        Route::get('cambiar/{id}', 		'CategoriasController@cambiar');
		Route::post('guardar',			'CategoriasController@guardar');
		Route::put('guardar/{id}', 		'CategoriasController@guardar');
		Route::delete('eliminar/{id}', 	'CategoriasController@eliminar');
		Route::post('restaurar/{id}', 	'CategoriasController@restaurar');
		Route::delete('destruir/{id}', 	'CategoriasController@destruir');
		Route::get('datatable', 		'CategoriasController@datatable');

    });

    Route::group(['prefix' => 'definiciones/etiquetas'], function() {
		Route::get('/', 				'EtiquetasController@index');
		Route::get('buscar/{id}', 		'EtiquetasController@buscar');
		Route::get('nuevo', 		    'EtiquetasController@nuevo');

		Route::get('cambiar/{id}', 		'EtiquetasController@cambiar');
		Route::post('guardar',			'EtiquetasController@guardar');
		Route::put('guardar/{id}', 		'EtiquetasController@guardar');

		Route::delete('eliminar/{id}', 	'EtiquetasController@eliminar');
		Route::post('restaurar/{id}', 	'EtiquetasController@restaurar');
		Route::delete('destruir/{id}', 	'EtiquetasController@destruir');

		Route::post('cambio', 			'EtiquetasController@cambio');
		Route::get('datatable', 		'EtiquetasController@datatable');
	});
});

Route::group(['middleware' => 'web', 'prefix' =>  Config::get('admin.prefix').'/publicar', 'namespace' => 'App\\Modules\Noticias\Http\Controllers'], function()
{
    Route::get('/',                     'PublicarController@index');
    Route::post('/guardar',             'PublicarController@guardar');
    Route::put('guardar/{id}',          'PublicarController@guardar');
    Route::get('/datatable',            'PublicarController@datatable');
    Route::get('buscar/{id}', 		    'PublicarController@buscar');

});
