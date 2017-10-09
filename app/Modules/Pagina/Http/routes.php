<?php

Route::group(['middleware' => 'web', 'namespace' => 'marygastro\Modules\Pagina\Http\Controllers'], function() {
	Route::resource('mail','mailController');

	Route::get('/', 'Controller@index')->name('pag.index');
	Route::get('{pag}', 'Controller@pagina')->where('pag', '[a-zA-Z0-9\-]+')->name('pag.pagina');
	
	Route::get('/blog/{id}', 'Controller@categorias'); 
	Route::get('/blog/noticia/{slug}', 'Controller@detNoti'); 
	
	Route::post('send-mail', 'Controller@sendMail')->name('pag.sendmail');
});