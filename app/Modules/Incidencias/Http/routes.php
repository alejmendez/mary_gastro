<?php

Route::group(['middleware' => 'web', 'prefix' => Config::get('admin.prefix').'/incidencias', 'namespace' => 'marygastro\\Modules\Incidencias\Http\Controllers'], function()
{
    Route::group(['prefix' => 'escritorios'], function() {

        Route::group(['prefix' => 'usuarios'], function() {
		    Route::get('/', 	'EscritorioUsuariosController@index');
        });
        
        Route::group(['prefix' => 'tecnicos'], function() {
		    Route::get('/', 	'EscritorioTecnicosController@index');
	    });
		
	});
});
