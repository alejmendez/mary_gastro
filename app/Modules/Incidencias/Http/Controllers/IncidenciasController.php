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
use marygastro\Modules\Base\Models\PersonasCorreo;

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
        return $this->view('incidencias::incidencias', [
            'Incidencias' => new Incidencias(),
            'casos' => \Auth::user()->consultas
        ]);
    }
    
    public function guardar(Request $request, $id = 0)
    {
        DB::beginTransaction();
        try {
            $Incidencias = $id == 0 ? new Incidencias() : Incidencias::find($id);
            if (\Auth::user()->consultas == 0) {
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

            $usuario = Usuario::where('id', \Auth::user()->id)->first();


            $doctora =  PersonasCorreo::where('personas_id', 2)->first();
               

            \Mail::send("pagina::emails.nuevaconsulta", [
                'usuario' => \Auth::user()->personas_id,
                'mensaje' =>' Nueva Consulta de ' . $usuario->personas->nombres
            ], function ($message) use ($usuario, $doctora) {
                $message->from('info@marygastro.com.ve', 'www.marygastro.com.ve');
                $message->to($doctora->correo, $usuario->personas->nombres)
                ->subject("NOTIFICACION DEL SISTEMA ONLINE MARY GASTRO.");
            });
        } catch (QueryException $e) {
            DB::rollback();
            return $e->getMessage();
        } catch (Exception $e) {
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
