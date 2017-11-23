<?php

namespace marygastro\Modules\Incidencias\Http\Controllers;

//Dependencias
use DB;
use URL;
use Yajra\Datatables\Datatables;

//Controlador Padre
use marygastro\Modules\Incidencias\Http\Controllers\Controller;
 
//Request
use marygastro\Http\Requests\Request;


//Modelos
use marygastro\Modules\Incidencias\Models\Incidencias;
use marygastro\Modules\Base\Models\Usuario;

class IncidenciasController extends Controller
{
    protected $titulo = 'incidencias';

    public $js = [
        'Incidencias'
    ];
    
    public $css = [
        'Incidencias'
    ];

    public $librerias = [
        'alphanum',
        'maskedinput',
        'datatables',
    ];

    public function index()
    {
       
        return $this->view('incidencias::incidencias',[
            'Incidencias' => new Incidencias(),
            'casos' => \Auth::user()->consultas
        ]);
    }
    
    public function guardar(Request $request, $id = 0)
    {
        DB::beginTransaction();
        try{
            $Incidencias = $id == 0 ? new Incidencias() : Incidencias::find($id);
            if(\Auth::user()->consultas == 0){
                return [
                    's'     => 'n',
                    'msj'   => 'no puede Realizar esta accion'
                ];  
            }

            $Incidencias->fill([
                'personas_id'   => \Auth::user()->personas_id,
                'caso'          => $request->caso,
                'descripcion'   => $request->descripcion
            ]);

            $Incidencias->save();
                $consultas = \Auth::user()->consultas - 1;

            Usuario::where('id', \Auth::user()->id)->update([
                'consultas' => $consultas
            ]);

        } catch(QueryException $e) {
            DB::rollback();
            return $e->getMessage();
        } catch(Exception $e) {
            DB::rollback();
            return $e->errorInfo[2];
        }
        DB::commit();

        return [
            'id'    => $Incidencias->id,
            'texto' => $Incidencias->titulo,
            's'     => 's',
            'msj'   => trans('controller.incluir')
        ];
    }


}
