<?php

use Carbon\Carbon;

Route::group(['middleware' => 'web', 'namespace' => 'marygastro\Modules\Pagina\Http\Controllers'], function() {
	Route::resource('mail','mailController');

	Route::get('/', 'Controller@index')->name('pag.index');
	
	$estreno = Carbon::create(2017, 11, 24, 19, 0, 0);
	$serverName = request()->server->get('SERVER_NAME');
	if (!(($serverName == 'marygastro.com.ve' || $serverName == 'www.marygastro.com.ve') && $estreno->gt(Carbon::now()))) {
		Route::get('{pag}', 'Controller@pagina')->where('pag', '[a-zA-Z0-9\-]+')->name('pag.pagina');
		
		Route::get('/categoria/{slug}', 'Controller@categorias')->name('pag.categoria');
		Route::get('/blog/{slug}', 'Controller@blog')->name('pag.blog');
		
		Route::post('send-mail', 'Controller@sendMail')->name('pag.sendmail');
	}
});