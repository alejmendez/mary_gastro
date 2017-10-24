<?php

namespace marygastro\Modules\Noticias\Http\Controllers;

//Controlador Padre
use marygastro\Modules\Noticias\Http\Controllers\Controller;

//Dependencias
use DB;
use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;

//Request
use marygastro\Modules\Noticias\Http\Requests\publicarRequest;

//Modelos
use marygastro\Modules\Noticias\Models\noticias;
use marygastro\Modules\Noticias\Models\noticias_etiquetas;
use marygastro\Modules\Noticias\Models\definiciones\etiquetas;
use marygastro\Modules\Noticias\Models\imagenes;

class PublicarController extends Controller
{
    protected $titulo = 'Publicación';

    public $librerias = [
      'datatables',
      'jquery-ui',
      'jquery-ui-timepicker',
    ];

    public $css = [
      'noticias',
    ];

    public $js =[
        'Publicar'
    ];

    public function index()
    {
        return $this->view('noticias::Publicar');
    }

    public function buscar(Request $request, $id = 0){
        if ($this->permisologia($this->ruta().'/restaurar') || $this->permisologia($this->ruta().'/destruir')) {
            $rs = Noticias::withTrashed()->find($id);
        }else {
            $rs = Noticias::find($id);
        }

      if ($rs){
        $imgArray=[];
        $imgs = imagenes::select('id', 'archivo', 'tamano')->where('noticias_id', $id)->get();

        foreach ($imgs as $img) {
         list($w, $h) =explode('x', $img->tamano);
         $imgArray[]=[
           'id' => $img->id,
           'img' => url('imagen/small/' . $img->archivo),
           'w' =>intval($w),
           'h' =>intval($h),
         ];
        }
        $etiquetas_id = [];

        // $etiquetas = noticias_etiquetas::where('noticias_id', $id)->select('etiquetas_id')->get();
        // foreach ($etiquetas as $etiqueta) {
  // 				$etiquetas_id[] = $etiqueta->etiquetas_id;
  // 			}

  			$respuesta = array_merge($rs->toArray(), [
  				's' => 's',
  				'msj' => trans('controller.buscar'),
  				'etiquetas_id' => $etiquetas_id,
  				'imagenes' => $imgArray,
  			]);

  			unset($respuesta['published_at']);

  			return $respuesta;
      }

      return trans('controller.nobuscar');

    }
    public function guardar(publicarRequest $request, $id = 0) {
  		try {
  			$noticias = noticias::find($id)->update([
  				'published_at' => $request->input('published_at'),
  			]);
  		} catch (Exception $e) {
  			return $e->errorInfo[2];
  		}

  		return ['s' => 's', 'msj' => trans('controller.incluir')];
  	}

  	public function etiquetas() {
  		return etiquetas::lists('nombre', 'id');
  		//return etiquetas::select('id', 'nombre')->get()->toArray();
  	}

  	public function datatable() {
  		$sql = noticias::select([
            'noticias.id',
  			'noticias.titulo',
  			'noticias.resumen',
  		])->whereNull('noticias.published_at');


  		return Datatables::of($sql)->setRowId('id')->make(true);
  	}

}
