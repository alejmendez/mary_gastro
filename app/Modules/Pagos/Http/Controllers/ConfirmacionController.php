<?php
namespace marygastro\Modules\Pagos\Http\Controllers;

//Controlador Padre
use marygastro\Modules\Pagos\Http\Controllers\Controller;

//Dependencias
use DB;
use marygastro\Http\Requests\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Database\QueryException;

//Request
use marygastro\Modules\Pagos\Http\Requests\PagosRequest;

//Modelos
use marygastro\Modules\Pagos\Models\Pagos;
use marygastro\Modules\Base\Models\usuario;
use marygastro\Modules\Base\Models\PersonasCorreo;

class ConfirmacionController extends Controller
{
    protected $titulo = 'Pagos';

    public $js = [
        'confirmacion'
    ];
    
    public $css = [
        ''
    ];

    public $librerias = [
      'datatables'
    ];

    public function index()
    {
        return $this->view('pagos::Confirmacion');
    }
    public function detalles($id = 0)
    {
        $this->js = [
            ''
        ];
        
        $this->css = [
            ''
        ];

        $sql = Pagos::select([
            'pagos.id',
            'personas.dni',
            'personas.nombres',
            'banco.nombre_banco as banco_emisor',
            'banco2.nombre_banco as banco_receptor',
            'planes.nombre',
            'pagos.fecha',
            'pagos.monto',
            'pagos.created_at'
        ])
        ->leftJoin('app_usuario', 'pagos.usuario_id', '=', 'app_usuario.id')
        ->leftJoin('personas', 'personas.id', '=', 'app_usuario.personas_id')
        ->leftJoin('planes', 'planes.id', '=', 'pagos.planes_id')
        ->leftJoin('banco', 'banco.id', '=', 'pagos.banco_emisor_id')
        ->leftJoin('banco as banco2', 'banco2.id', '=', 'pagos.banco_receptor_id')
        ->orderBy('pagos.created_at', 'DESC')
        ->where('pagos.id', $id);

        return $this->view('pagos::Confirmacion-info', [
            'info' => $sql->first()
        ]);
    }


    public function buscar(Request $request, $id = 0)
    {
        if ($this->permisologia($this->ruta() . '/restaurar') || $this->permisologia($this->ruta() . '/destruir')) {
            $Pagos = Pagos::withTrashed()->find($id);
        } else {
            $Pagos = Pagos::find($id);
        }

        if ($Pagos) {
            return array_merge($Pagos->toArray(), [
                's' => 's',
                'msj' => trans('controller.buscar')
            ]);
        }

        return trans('controller.nobuscar');
    }

    public function guardar(PagosRequest $request, $id = 0)
    {
        DB::beginTransaction();
        try {
            $Pagos = $id == 0 ? new Pagos() : Pagos::find($id);

            $data = $request->all();

            $data['usuario_id'] = \Auth::user()->id;
            $Pagos->fill($data);
            $Pagos->save();

            $correo = PersonasCorreo::where('personas_id', 2)
                ->where('principal', 1)->first();
            $usuario = Usuario::find(\Auth::user()->id);
            
            
            $this->notificacion(3, 2, \Auth::user()->id, 3, $Pagos->id);
            
            \Mail::send("pagina::emails.notificacion", [
                'usuario' => $usuario,
                'mensaje' =>  'Solicitud  de  Pago de ' .  $usuario->personas->nombres
            ], function ($message) use ($usuario, $correo) {
                $message->from('info@marygastro.com.ve', 'www.marygastro.com.ve');
                $message->to($correo->correo, $usuario->personas->nombres)
                ->subject("NOTIFICACION DEL SISTEMA ONLINE MARY GASTRO.");
            });
        } catch (QueryException $e) {
            DB::rollback();
            //return response()->json(['s' => 's', 'msj' => $e->getMessage()], 500);
            return ['s' => 'n', 'msj' => $e->getMessage()];
        } catch (Exception $e) {
            DB::rollback();
            return ['s' => 'n', 'msj' => $e->errorInfo[2]];
        }
        DB::commit();

        return [
            'id'    => $Pagos->id,
            'texto' => $Pagos->nombre,
            's'     => 's',
            'msj'   => trans('controller.incluir')
        ];
    }


    public function datatable(Request $request)
    {
        $sql = Pagos::select([
            'pagos.id',
            'personas.dni',
            'personas.nombres',
            'banco.nombre_banco as banco_emisor',
            'banco2.nombre_banco as banco_receptor',
            'planes.nombre',
            'pagos.fecha',
            'pagos.monto',
           
            'pagos.created_at'
        ])
        ->leftJoin('app_usuario', 'pagos.usuario_id', '=', 'app_usuario.id')
        ->leftJoin('personas', 'personas.id', '=', 'app_usuario.personas_id')
        ->leftJoin('planes', 'planes.id', '=', 'pagos.planes_id')
        ->leftJoin('banco', 'banco.id', '=', 'pagos.banco_emisor_id')
        ->leftJoin('banco as banco2', 'banco2.id', '=', 'pagos.banco_receptor_id')
        ->orderBy('pagos.created_at', 'DESC');
   
        return Datatables::of($sql)
            ->setRowId('id')
            ->make(true);
    }
}
