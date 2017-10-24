<?php

namespace marygastro\Modules\Noticias\Http\Controllers;

//Controlador principal del modulo
use marygastro\Modules\Noticias\Http\Controllers;

//dependencias
use DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

//Request
use marygastro\Modules\Noticias\Http\Requests\AudioRequest;

//modelo
use marygastro\Modules\Noticias\Model\Audio as Audio;



class AudioController extends Controller
{
    protect $titulo='Audio';

    public $librerias = [
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
        return $this->view('noticias::audio');
    }

    public function buscar(Request $request, $id = 0){
      $audio = audio::find($id);

      if ($audio){
        return array_merge($audio->toArray(), [
          's' => 's',
          'msj' => trans('controller.buscar')
        ]);
      }

      return trans('controller.nobuscar');
    }

    public function crear(AudioRequest $request){
      DB::beginTransaction();
      try{
        $audio = audio::create([
          'titulo' => $request->titulo,
          'descripcion'=>$request->descripcion,
          'url'=>$request->url,
          'published_at'=>$request->published_at
        ]);
      }catch(Exception $e){
        DB::rollback();
        return $e->errorInfo[2];
      }
      DB::commit();
      return ['s' => 's', 'msj' => trans('controller.incluir')];
    }

    public function actualizar(AudioRequest $request, $id=0){
      DB::beginTransaction();
      try{
        $audio = audio::find($id)->update($request->all());
      }catch(Exception $e){
        DB::rollback();
        return $e ->errorInfo[2];
      }
      DB::commint();
      return ['s' => 's', 'msj' => trans('controller.incluir')];
    }

    public function eliminar(Request $request, $id = 0){
      try{
        $audio = audio::destroy($id);
      }catch(Exception $e){
        return $e->errorInfo[2];
      }
      return ['s' => 's', 'msj' => trans('controller.eliminar')];
    }

    public function publicar(){
      return strtolower($this->usuario->super) === 's' || $this->permisologia('publicar');
    }

    public function datatable(){
      $sql = audio::select([
  			'id', 'titulo', 'descripcion', 'url', 'published_at'
  		]);
      return Datatables::of($sql)->setRowId('id')->make(true);
    }
}
