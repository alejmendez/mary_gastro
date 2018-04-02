<?php

Route::group(['middleware' => 'web', 'prefix' => Config::get('admin.prefix').'/incidencias', 'namespace' => 'marygastro\\Modules\Incidencias\Http\Controllers'], function () {
    Route::group(['prefix' => 'escritorios/tecnicos'], function () {
        Route::get('/', 'EscritorioTecnicosController@index');
        Route::get('/activas', 'EscritorioTecnicosController@activas');
        Route::get('/cerrados', 'EscritorioTecnicosController@cerrados');
    });
        
    
    Route::group(['prefix' => 'inicio/usuarios'], function () {
        Route::get('/', 'EscritorioUsuariosController@index');
        Route::get('/datatable', 'EscritorioUsuariosController@datatable');
    });

    Route::group(['prefix' => 'incidencias'], function () {
        Route::get('/', 'IncidenciasController@index');
        Route::post('/guardar', 'IncidenciasController@guardar');
    });
    Route::group(['prefix' => 'inbox'], function () {
        Route::get('inbox/{id}', 'InboxController@index');
        Route::post('inbox/chats', 'InboxController@chats');
        Route::post('inbox/msj', 'InboxController@msj');
        Route::post('inbox/cierre', 'InboxController@cierre');
    });
        

    Route::group(['prefix' => 'asignar'], function () {
        Route::get('/', 'AsignarController@index');
        Route::get('buscar/{id}', 'AsignarController@buscar');
        Route::post('guardar', 'AsignarController@guardar');
        Route::put('guardar/{id}', 'AsignarController@guardar');
    });

    //{{route}}
});
