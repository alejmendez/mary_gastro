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

	public $patch_js = [
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

	public $patch_css = [
		'public/css',
		'public/plugins',
		'app/Modules/Pagina/Assets/css',
	];

	public $libreriasIniciales = [
		'OpenSans', 'font-awesome',
		'animate', 'wow', 'bootstrap',
		'pace', 'jquery-form', 'jquery-ui',
		'blockUI',
		'modernizr',
		'pnotify'
	];

	public function index(Request $request)
	{
		$estreno = Carbon::create(2017, 11, 24, 18, 0, 0);
		$serverName = request()->server->get('SERVER_NAME');
		if (($serverName == 'marygastro.com.ve' || $serverName == 'www.marygastro.com.ve') && $estreno->gt(Carbon::now())) {
			return $this->view('pagina::contador', [
				'estreno' => $estreno
			]);
		}

		$noticias = Noticias::select([
			'noticias.id',
			'noticias.titulo',
			'noticias.slug',
			'noticias.resumen',
			'noticias.published_at',
		])
		->where('noticias.published_at','<=', Carbon::now())->get()->take(3);

		$Imagenes = Imagenes::select(['archivo']);

		return $this
			->setTitulo('GastroPediatra en Acción')
			->view('pagina::index',[
				'noticias' => $noticias,
				'imagen' => $Imagenes
			]);
	}

	public function pagina(Request $request, $pag)
	{
		$dir = __DIR__ . '/../../Resources/views/';

		if (is_file($dir . $pag . '.blade.php') || is_file($dir . $pag . '.php')){

			if ($pag === 'blogs') {
				return $this->blogs();
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

	public function categorias(Request $request)
	{
		$noticias = Noticias::with('categorias')->select([
			'id',
			'titulo',
			'slug',
			'resumen',
			'published_at'
		])
			->where('published_at', '<=', date('Y-m-d H:i'))
			->whereHas('categorias', function ($query) use ($request) {
				$query->where('slug', $request->slug);
			})
			->orderByDesc('published_at');

		$noticias = $noticias
			->paginate(4);
		
		$listaNoticias = Noticias::select([
			'id',
			'titulo',
			'slug',
			'resumen',
			'published_at'
		])
			->where('published_at', '<=', date('Y-m-d H:i'))
			->orderByDesc('published_at')
			->take(4);

		$categorias = Categorias::select([
			'categorias.nombre',
			'categorias.id',
			DB::raw('Count(noticia_categoria.noticias_id) as total'),
		])
			->leftJoin('noticia_categoria', 'noticia_categoria.categorias_id', '=', 'categorias.id')
			->orderBy('categorias.nombre')
			->groupby('categorias.nombre')
			->groupby('categorias.id')
			->get();

		return $this->view('pagina::blogs',[
			'noticias'      => $noticias,
			'listaNoticias' => $listaNoticias,
			'categorias'    => $categorias
		]);
	}

	public function blog ($slug)
	{
		$noticia = Noticias::where('published_at','<=', Carbon::now())
			->where('slug', $slug)
			->first();

		$categorias = Categorias::select([
			'categorias.nombre',
			'categorias.id',
			DB::raw('Count(noticia_categoria.noticias_id) as total'),
		])
			->leftJoin('noticia_categoria', 'noticia_categoria.categorias_id', '=', 'categorias.id')
			->whereNull('categorias.deleted_at')
			->groupby('categorias.nombre')
			->groupby('categorias.id')
			->get();

		$listaNoticias = Noticias::select([
			'id',
			'titulo',
			'slug',
			'resumen',
			'published_at'
		])
			->where('published_at', '<=', date('Y-m-d H:i'))
			->orderByDesc('published_at')
			->paginate(4);

		return $this
			->setTitulo('GastroPediatra en Acción')
			->view('pagina::blog', [
				'noticia' 		=> $noticia,
				'categorias' 	=> $categorias,
				'listaNoticias' => $listaNoticias,
			]);
	}

	public function blogs() 
	{
		$noticias = Noticias::select([
			'id',
			'titulo',
			'slug',
			'resumen',
			'published_at'
		])
			->where('published_at', '<=', date('Y-m-d H:i'))
			->orderByDesc('published_at')
			->paginate(4);
		
		$listaNoticias = Noticias::select([
			'id',
			'titulo',
			'slug',
			'resumen',
			'published_at'
		])
			->where('published_at', '<=', date('Y-m-d H:i'))
			->orderByDesc('published_at')
			->take(4);

		$categorias = Categorias::select([
			'categorias.nombre',
			'categorias.id',
			DB::raw('Count(noticia_categoria.noticias_id) as total'),
		])
			->leftJoin('noticia_categoria', 'noticia_categoria.categorias_id', '=', 'categorias.id')
			->orderBy('categorias.nombre')
			->groupby('categorias.nombre')
			->groupby('categorias.id')
			->get();

		return $this->view('pagina::blogs',[
			'noticias'      => $noticias,
			'listaNoticias' => $listaNoticias,
			'categorias'    => $categorias
		]);
	}
}
