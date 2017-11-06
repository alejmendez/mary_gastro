<?php

Route::group(['middleware' => 'web', 'prefix' => Config::get('admin.prefix').'/incidencias', 'namespace' => 'marygastro\\Modules\Incidencias\Http\Controllers'], function()
{

       
    Route::group(['prefix' => 'escritorios/tecnicos'], function() {
        Route::get('/', 	'EscritorioTecnicosController@index');
    });
		
    
    Route::group(['prefix' => 'inicio/usuarios'], function() {
        Route::get('/', 	'EscritorioUsuariosController@index');
    });
        
	
});
