<?php

Route::group(['middleware' => 'web', 'prefix' => Config::get('admin.prefix').'/incidencias', 'namespace' => 'marygastro\\Modules\Incidencias\Http\Controllers'], function()
{

       
    Route::group(['prefix' => 'escritorios/tecnicos'], function() {
        Route::get('/', 	'EscritorioTecnicosController@index');
    });
		
    
    Route::group(['prefix' => 'inicio/usuarios'], function() {
        Route::get('/', 	'EscritorioUsuariosController@index');
        Route::get('/datatable', 	'EscritorioUsuariosController@datatable');
    });

    Route::group(['prefix' => 'incidencias'], function() {
        Route::get('/', 	        'IncidenciasController@index');
        Route::post('/guardar', 	'IncidenciasController@guardar');
    });
    Route::group(['prefix' => 'inbox'], function() {
        Route::get('inbox/{id}', 	'InboxController@index');
        Route::post('inbox/chats', 	    'InboxController@chats');
        Route::post('inbox/msj', 	    'InboxController@msj');
    });
        
	
});
