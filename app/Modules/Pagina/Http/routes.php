<?php

use Carbon\Carbon;

Route::group(['middleware' => 'web', 'namespace' => 'marygastro\Modules\Pagina\Http\Controllers'], function() {
	Route::resource('mail','mailController');

	Route::get('/', 'Controller@index')->name('pag.index');
	
	$estreno = Carbon::create(2017, 11, 24, 18, 0, 0);
	$serverName = request()->server->get('SERVER_NAME');
	if (!(($serverName == 'marygastro.com.ve' || $serverName == 'www.marygastro.com.ve') && $estreno->gt(Carbon::now()))) {
		Route::get('{pag}', 'Controller@pagina')->where('pag', '[a-zA-Z0-9\-]+')->name('pag.pagina');
		
		Route::get('/blog/{id}', 'Controller@categorias'); 
		Route::get('/blog/noticia/{slug}', 'Controller@detNoti'); 
		
		Route::post('send-mail', 'Controller@sendMail')->name('pag.sendmail');
	}
});