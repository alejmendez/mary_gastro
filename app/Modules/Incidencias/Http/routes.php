<?php

Route::group(['middleware' => 'web', 'prefix' => 'incidencias', 'namespace' => 'marygastro\\Modules\Incidencias\Http\Controllers'], function()
{
    Route::get('/', 'IncidenciasController@index');
});
