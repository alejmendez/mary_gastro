<?php

namespace marygastro\Modules\Noticias\Http\Controllers;

//Controlador Padre
use marygastro\Modules\Noticias\Http\Controllers\Controller;

//Dependencias
use DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

//Request
use marygastro\Modules\Noticias\Http\Requests\VideoRequest;

//Modelos
use marygastro\Modules\Noticias\Model\Video as video;

class VideoController extends Controller
{
    protected $titulo ="Video";

    Public $librerias = [
      'alphanum',
  		'maskedinput',
  		'datatables',
  		'jquery-ui',
  		'jquery-ui-timepicker'
    ];

    public function __construct(){
      parent::__construct();
    }

    public function index()
    {
        return $this->view('noticias::video');
    }

    public function buscar(Request $request, $id = 0){
  		$video = video::find($id);

  		if ($video){
  			return array_merge($video->toArray(), [
  				's' => 's',
  				'msj' => trans('controller.buscar')
  			]);
  		}

  		return trans('controller.nobuscar');
  	}

    public function crear(VideoRequest $request){
  		DB::beginTransaction();
  		try{
  			$value = $request->url;

  	        $match = preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $value, $matches);
  	        if((int) $match > 0) {
                  $video = video::create([
                  	'titulo' => $request->titulo,
  					'descripcion'=>$request->descripcion,
  					'url'=> $matches[0],
  		 			'published_at' => $request->published_at
  		 		]);
  	        }
  		}catch(Exception $e){
  			DB::rollback();
  			return $e->errorInfo[2];
  		}
  		DB::commit();

  		return ['s' => 's', 'msj' => trans('controller.incluir')];
  	}

    public function actualizar(VideoRequest $request, $id = 0){
  		DB::beginTransaction();
  		try{
  			$video = video::find($id)->update($request->all());
  		}catch(Exception $e){
  			DB::rollback();
  			return $e->errorInfo[2];
  		}
  		DB::commit();

  		return ['s' => 's', 'msj' => trans('controller.incluir')];
  	}

  	public function eliminar(Request $request, $id = 0){
  		try{
  			$video = video::destroy($id);
  		}catch(Exception $e){
  			return $e->errorInfo[2];
  		}

  		return ['s' => 's', 'msj' => trans('controller.eliminar')];
  	}
  	public function publicar(){
  		return strtolower($this->usuario->super) === 's' || $this->permisologia('publicar');
  		//return in_array($this->usuario->app_perfil_id, $this->perfiles_publicar);
  	}

  	public function datatable(){
  		$sql = video::select([
  			'id', 'titulo', 'descripcion', 'url', 'published_at'
  		]);

  	    return Datatables::of($sql)->setRowId('id')->make(true);
  	}
}
