<?php

Route::group(['middleware' => 'web', 'prefix' =>  Config::get('admin.prefix'), 'namespace' => 'marygastro\\Modules\Cms\Http\Controllers'], function () {
    Route::group(['prefix' => 'tips'], function () {
        Route::get('/', 'TipsController@index');
        Route::get('nuevo', 'TipsController@nuevo');
        Route::get('cambiar/{id}', 'TipsController@cambiar');
        
        Route::get('buscar/{id}', 'TipsController@buscar');

        Route::post('guardar', 'TipsController@guardar');
        Route::put('guardar/{id}', 'TipsController@guardar');

        Route::delete('eliminar/{id}', 'TipsController@eliminar');
        Route::post('restaurar/{id}', 'TipsController@restaurar');
        Route::delete('destruir/{id}', 'TipsController@destruir');

        Route::get('datatable', 'TipsController@datatable');
    });

    Route::group(['prefix' => 'testimonios'], function () {
        Route::get('/', 'TestimoniosController@index');
        Route::get('nuevo', 'TestimoniosController@nuevo');
        Route::get('cambiar/{id}', 'TestimoniosController@cambiar');
        
        Route::get('buscar/{id}', 'TestimoniosController@buscar');

        Route::post('guardar', 'TestimoniosController@guardar');
        Route::put('guardar/{id}', 'TestimoniosController@guardar');

        Route::delete('eliminar/{id}', 'TestimoniosController@eliminar');
        Route::post('restaurar/{id}', 'TestimoniosController@restaurar');
        Route::delete('destruir/{id}', 'TestimoniosController@destruir');

        Route::get('datatable', 'TestimoniosController@datatable');
    });

    //{{route}}
});
