<?php

namespace marygastro\Modules\Base\Http\Controllers;

//Controlador Padre
use marygastro\Modules\Base\Http\Controllers\Controller;

//Dependencias
use DB;
use marygastro\Http\Requests\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Database\QueryException;

//Request

//Modelos
use marygastro\Modules\Base\Models\Notificaciones;

class NotificacionesController extends Controller
{
    protected $titulo = '';
    public $autenticar = false;
    public $js = [
  
    ];
    
    public $css = [
       
    ];

    public $librerias = [
    
    ];
 

    public function guardar(Request $request)
    {
        DB::beginTransaction();
        try {
            $Notificaciones = Notificaciones::find($request->id);
            
    
            $Notificaciones->fill([
                'visto' => true
            ]);

            $Notificaciones->save();
        } catch (QueryException $e) {
            DB::rollback();
            return $e->getMessage();
        } catch (Exception $e) {
            DB::rollback();
            return $e->errorInfo[2];
        }
        DB::commit();

        return [
            'id'    => $Profesion->id,
            'texto' => $Profesion->nombre,
            's'     => 's',
            'msj'   => trans('controller.incluir')
        ];
    }
}
