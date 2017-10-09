<?php namespace marygastro\Modules\Pagina\Http\Controllers;

use DB;
use SEO;
use SEOMeta;
use Carbon\Carbon;

//Dependencias
use Illuminate\Http\Request;

use marygastro\Http\Controllers\Controller as BaseController;
use marygastro\Modules\Pagina\Http\Requests\ContactoRequest;
use marygastro\Modules\Noticias\Models\Noticias;
use marygastro\Modules\Noticias\Models\Noticias_Categorias;
use marygastro\Modules\Noticias\Models\Categorias;
use marygastro\Modules\Noticias\Models\Imagenes;

class Controller extends BaseController
{
	public $app = 'Pagina';
	
	public $titulo = '';

	public $autenticar = false;
	public $paginar = 12;

	protected $patch_js = [
		'public/js',
		'public/plugins',
		'app/Modules/Pagina/Assets/js',
		'public/js/pagina',
	];

	
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

	protected $patch_css = [
		'public/css',
		'public/plugins',
		'app/Modules/Pagina/Assets/css',
	];

	public $libreriasIniciales = [
		'OpenSans', 'font-awesome', 
		'animate', 'wow', 'bootstrap',
		'pace', 'jquery-form', 'jquery-ui',
		'blockUI',
		'modernizr'
	];

	 public function index(Request $request)
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
		->where('noticias.published_at','<=', date('Y-m-d H:i'))->get()->take(3);

	 	
		return $this
			->setTitulo('GastroPediatra en Acción')
			->view('pagina::index',[
				'noticias' => $noticias
			]);
	} 
	
	public function pagina(Request $request, $pag)
	{
		$dir = __DIR__ . '/../../Resources/views/';
		
		if (is_file($dir . $pag . '.blade.php') || is_file($dir . $pag . '.php')){
			
			if($pag === 'blog'){
				
				$noticias = Noticias::select([
					'noticias.titulo',
					'noticias.slug',
					
					'noticias.resumen',
					'noticias.published_at',
					'imagenes.archivo'	
				])
				->leftJoin('imagenes', 'imagenes.noticias_id','=', 'noticias.id')
				->where('noticias.published_at','<=', date('Y-m-d H:i'))
				->whereNull('noticias.deleted_at')
				->paginate(4);
				
				
				$categorias = Categorias::select([
					'categorias.nombre',
					'categorias.id',
					DB::raw('Count(noticias.id) as total'),
				])
				->whereNull('categorias.deleted_at')
				->leftJoin('noticias', 'noticias.categorias_id','=', 'categorias.id')
				->groupby('categorias.nombre')
				->groupby('categorias.id')->get();
				
					
				return $this->view('pagina::blog',[
					'noticias'   => $noticias,
					'categorias' => $categorias
				]);
			}
			return $this->view('pagina::' . $pag);
		}

		abort(404);
	}

	public function sendMail(ContactoRequest $request)
	{
		\Mail::send("pagina::emails.mail", ['request' => $request], function($message) use($request) {
			$message->from('no_responder@marygastro', 'marygastro');
			$message->to('info@marygastro', 'marygastro')
				->subject("Contacto de " . $request->nombre . ".");

			$message->cc('alejmendez.87@gmail.com', 'alejandro mendez');
			$message->cc('leonardoberti21@gmail.com', 'Leonardo Berti');
		});

		return 'correo enviado satisfactoriamente';
	}

	public function setTitulo($titulo)
	{
		SEOMeta::setTitle('Dra. MaryGastro ' . $titulo);
		return $this;
	}


	public function categorias(Request $request){
		$noticias = Noticias::select([
			'noticias.titulo',
			'noticias.slug',
			'noticias.categorias_id',
			'noticias.resumen',
			'noticias.published_at',
			'imagenes.archivo'

		])
		->leftJoin('imagenes', 'imagenes.noticias_id','=', 'noticias.id')
		->leftJoin('categorias', 'noticias.categorias_id','=', 'categorias.id')
		->whereNull('categorias.deleted_at')
		->where('categorias.slug', $request->id)->paginate(4);
		
		
		$categorias = Categorias::select([
			'categorias.id',
			'categorias.nombre',
			DB::raw('Count(noticias.id) as total'),
		])
		->leftJoin('noticias', 'noticias.categorias_id','=', 'categorias.id')
		->groupby('categorias.nombre')
		->whereNull('categorias.deleted_at')
		->whereNull('noticias.deleted_at')
		->groupby('categorias.id')->get();
		
			
		return $this->view('pagina::blog',[
			'noticias'   => $noticias,
			'categorias' => $categorias
		]);
	} 

	public function detNoti ($slug){
		$detNoti = Noticias::select([
			'noticias.titulo',
			'noticias.slug',
			'noticias.categorias_id',
			'noticias.contenido_html',
			'noticias.published_at',
			'imagenes.archivo'	
		])
		->leftJoin('imagenes', 'imagenes.noticias_id','=', 'noticias.id')
		->where('noticias.published_at','<=', date('Y-m-d H:i'))
		->where('slug', '=', $slug)->get();

		$categorias = Categorias::select([
			'categorias.nombre',
			'categorias.id',
			DB::raw('Count(noticias.id) as total'),
		])
		->whereNull('categorias.deleted_at')
		->leftJoin('noticias', 'noticias.categorias_id','=', 'categorias.id')
		->groupby('categorias.nombre')
		->groupby('categorias.id')->get();

		$noticias = Noticias::select([
			'noticias.titulo',
			'noticias.slug',
			
			'noticias.resumen',
			'noticias.published_at',
			'imagenes.archivo'	
		])
		->leftJoin('imagenes', 'imagenes.noticias_id','=', 'noticias.id')
		->where('noticias.published_at','<=', date('Y-m-d H:i'))
		->whereNull('noticias.deleted_at')
		->paginate(4);

	 	
		return $this
			->setTitulo('GastroPediatra en Acción')
			->view('pagina::detNoti',[
				'detNoti' 		=> $detNoti,
				'categorias' 	=> $categorias,
				'noticias' 		=> 	$noticias
			]);
	}

}