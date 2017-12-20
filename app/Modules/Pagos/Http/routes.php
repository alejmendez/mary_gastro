<?php

Route::group(['middleware' => 'web', 'prefix' =>  Config::get('admin.prefix').'/pagos', 'namespace' => 'marygastro\\Modules\Pagos\Http\Controllers'], function()
{
     Route::group(['prefix' => 'bancos'], function() {
		Route::get('/', 				'BancoController@index');
		Route::get('buscar/{id}', 		'BancoController@buscar');
        Route::get('nuevo', 		    'BancoController@nuevo');
        Route::get('cambiar/{id}', 		'BancoController@cambiar');
		Route::post('guardar',			'BancoController@guardar');
		Route::put('guardar/{id}', 		'BancoController@guardar');
		Route::delete('eliminar/{id}', 	'BancoController@eliminar');
		Route::post('restaurar/{id}', 	'BancoController@restaurar');
		Route::delete('destruir/{id}', 	'BancoController@destruir');
		Route::get('datatable', 		'BancoController@datatable');

    });

    Route::group(['prefix' => 'planes'], function() {
        Route::get('/',                 'PlanesController@index');
        Route::get('nuevo',             'PlanesController@nuevo');
        Route::get('cambiar/{id}',      'PlanesController@cambiar');
        
        Route::get('buscar/{id}',       'PlanesController@buscar');

        Route::post('guardar',          'PlanesController@guardar');
        Route::put('guardar/{id}',      'PlanesController@guardar');

        Route::delete('eliminar/{id}',  'PlanesController@eliminar');
        Route::post('restaurar/{id}',   'PlanesController@restaurar');
        Route::delete('destruir/{id}',  'PlanesController@destruir');

        Route::get('datatable',         'PlanesController@datatable');
     });


        Route::group(['prefix' => 'pagos'], function() {
        Route::get('/',                 'PagosController@index');
        Route::get('nuevo',             'PagosController@nuevo');
        Route::get('cambiar/{id}',      'PagosController@cambiar');
        
        Route::get('buscar/{id}',       'PagosController@buscar');

        Route::post('guardar',          'PagosController@guardar');
        Route::put('guardar/{id}',      'PagosController@guardar');

        Route::delete('eliminar/{id}',  'PagosController@eliminar');
        Route::post('restaurar/{id}',   'PagosController@restaurar');
        Route::delete('destruir/{id}',  'PagosController@destruir');

        Route::get('datatable',         'PagosController@datatable');
     });

    //{{route}}
});