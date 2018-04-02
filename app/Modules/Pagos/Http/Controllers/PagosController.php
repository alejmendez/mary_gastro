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

class PagosController extends Controller
{
    protected $titulo = 'Pagos';

    public $js = [
        'Pagos'
    ];
    
    public $css = [
        'Pagos'
    ];

    public $librerias = [
        'jquery-ui',
        'jquery-ui-timepicker'
    ];

    public function index()
    {
        return $this->view('pagos::Pagos', [
            'Pagos' => new Pagos()
        ]);
    }

    public function nuevo()
    {
        $Pagos = new Pagos();
        return $this->view('pagos::Pagos', [
            'layouts' => 'base::layouts.popup',
            'Pagos' => $Pagos
        ]);
    }

    public function cambiar(Request $request, $id = 0)
    {
        $Pagos = Pagos::find($id);
        return $this->view('pagos::Pagos', [
            'layouts' => 'base::layouts.popup',
            'Pagos' => $Pagos
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
            //$Pagos->id
            
            $this->notificacion(3, 2, \Auth::user()->id, 3, '');
            
            \Mail::send("pagina::emails.notificacion", [
                'usuario' => $usuario,
                'mensaje' =>  'Solicitud  de  Pago de ' . $usuario->personas->nombres
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

    public function eliminar(Request $request, $id = 0)
    {
        try {
            Pagos::destroy($id);
        } catch (QueryException $e) {
            return ['s' => 'n', 'msj' => $e->getMessage()];
        } catch (Exception $e) {
            return ['s' => 'n', 'msj' => $e->errorInfo[2]];
        }

        return ['s' => 's', 'msj' => trans('controller.eliminar')];
    }

    public function restaurar(Request $request, $id = 0)
    {
        try {
            Pagos::withTrashed()->find($id)->restore();
        } catch (QueryException $e) {
            return ['s' => 'n', 'msj' => $e->getMessage()];
        } catch (Exception $e) {
            return ['s' => 'n', 'msj' => $e->errorInfo[2]];
        }

        return ['s' => 's', 'msj' => trans('controller.restaurar')];
    }

    public function destruir(Request $request, $id = 0)
    {
        try {
            Pagos::withTrashed()->find($id)->forceDelete();
        } catch (QueryException $e) {
            return ['s' => 'n', 'msj' => $e->getMessage()];
        } catch (Exception $e) {
            return ['s' => 'n', 'msj' => $e->errorInfo[2]];
        }

        return ['s' => 's', 'msj' => trans('controller.destruir')];
    }

    public function datatable(Request $request)
    {
        $sql = Pagos::select([
            'id', 'usuario_id', 'banco_emisor_id', 'banco_receptor_id', 'tipo_deposito', 'cod_referencia', 'planes_id', 'url', 'fecha', 'estatus', 'monto', 'deleted_at'
        ]);

        if ($request->verSoloEliminados == 'true') {
            $sql->onlyTrashed();
        } elseif ($request->verEliminados == 'true') {
            $sql->withTrashed();
        }

        return Datatables::of($sql)
            ->setRowId('id')
            ->setRowClass(function ($registro) {
                return is_null($registro->deleted_at) ? '' : 'bg-red-thunderbird bg-font-red-thunderbird';
            })
            ->make(true);
    }
}
