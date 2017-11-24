<?php

use Carbon\Carbon;

Route::group(['middleware' => 'web', 'namespace' => 'marygastro\Modules\Pagina\Http\Controllers'], function() {
	Route::resource('mail','mailController');

	Route::get('/', 'Controller@index')->name('pag.index');
	
	Route::get('/categoria/{slug}', 'Controller@categorias')->name('pag.categoria');
	Route::get('/blogs', 'Controller@blogs')->name('pag.blogs');
	Route::get('/blog/{slug}', 'Controller@blog')->name('pag.blog');
	
	Route::post('send-mail', 'Controller@sendMail')->name('pag.sendmail');

	Route::get('{pag}', 'Controller@pagina')->where('pag', '[a-zA-Z0-9\-]+')->name('pag.pagina');
});