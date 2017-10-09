<?php

namespace marygastro\Modules\Pagina\Http\Controllers;

use marygastro\Modules\Pagina\Http\Controllers\Controller;
use marygastro\Modules\Noticias\Models\Noticias;
use marygastro\Modules\Noticias\Models\Noticias_Categorias;
use marygastro\Modules\Noticias\Models\Categorias;
use marygastro\Modules\Noticias\Models\Imagenes;
use Carbon\Carbon;

class PaginaController extends Controller {
	
	public $meses =[
		1=>'ENE',
		'FEB',
		'MAR',
		'ABR',
		'MAY',
		'JUN',
		'JUL',
		'AGO',
		'SEP',
		'OCT',
		'NOV',
		'DIC'

	];
	
	public function index()
	{
		$noticias = Noticias::select([
			'noticias.titulo',
			'noticias.slug',
			'noticias.categorias_id',
			'noticias.resumen',
			'noticias.published_at',
			'imagenes.archivo'	
		])
		->leftJoin('imagenes', 'imagenes.noticias_id','=', 'noticias.id')
		->where('noticias.published_at','<=', date('Y-m-d H:i'))->get();

	 	
		return $this->view('pagina::index',[
			'noticias' => $noticias
		]);
	}
}
