<?php

Route::group(['middleware' => 'web', 'prefix' =>  Config::get('admin.prefix').'/Noticias', 'namespace' => 'marygastro\\Modules\Noticias\Http\Controllers'], function()
{
    Route::get('/',                     'NoticiasController@index');
    Route::post('guardar',              'NoticiasController@guardar');
    Route::get('buscar/{id}',           'NoticiasController@buscar');
    Route::put('guardar/{id}',          'NoticiasController@guardar');
    Route::get('datatable',             'NoticiasController@datatable');
    Route::delete('eliminar/{id}',      'NoticiasController@eliminar');
    Route::post('restaurar/{id}',       'NoticiasController@restaurar');
    Route::delete('destruir/{id}',      'NoticiasController@destruir');
    Route::post('subir',                'NoticiasController@subir');

    Route::group(['prefix' => 'definiciones/categorias'], function() {
		Route::get('/', 				'CategoriasController@index');
		Route::get('buscar/{id}', 		'CategoriasController@buscar');

		Route::post('guardar',			'CategoriasController@guardar');
		Route::put('guardar/{id}', 		'CategoriasController@guardar');

		Route::delete('eliminar/{id}', 	'CategoriasController@eliminar');
		Route::post('restaurar/{id}', 	'CategoriasController@restaurar');
		Route::delete('destruir/{id}', 	'CategoriasController@destruir');

		Route::get('datatable', 		'CategoriasController@datatable');

    });
});

Route::group(['middleware' => 'web', 'prefix' =>  Config::get('admin.prefix').'/publicar', 'namespace' => 'marygastro\\Modules\Noticias\Http\Controllers'], function()
{
    Route::get('/',                     'PublicarController@index');
    Route::post('/guardar',             'PublicarController@guardar');
    Route::put('guardar/{id}',          'PublicarController@guardar');
    Route::get('/datatable',            'PublicarController@datatable');
    Route::get('buscar/{id}', 		    'PublicarController@buscar');

});
