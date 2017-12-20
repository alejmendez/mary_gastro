<?php
namespace  marygastro\Modules\Pagos\Http\Controllers;

//Controlador Padre
use  marygastro\Modules\Pagos\Http\Controllers\Controller;

//Dependencias
use DB;
use marygastro\Http\Requests\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Database\QueryException;

//Request
use  marygastro\Modules\Pagos\Http\Requests\BancoRequest;

//Modelos
use  marygastro\Modules\Pagos\Models\Banco;

class BancoController extends Controller
{
    protected $titulo = 'Banco';

    public $js = [
        'Banco'
    ];
    
    public $css = [
        'Banco'
    ];

    public $librerias = [
        'datatables'
    ];

    public function index()
    {
        return $this->view('pagos::Banco', [
            'Banco' => new Banco()
        ]);
    }

    public function nuevo()
    {
        $Banco = new Banco();
        return $this->view('pagos::Banco', [
            'layouts' => 'base::layouts.popup',
            'Banco' => $Banco
        ]);
    }

    public function cambiar(Request $request, $id = 0)
    {
        $Banco = Banco::find($id);
        return $this->view('pagos::Banco', [
            'layouts' => 'base::layouts.popup',
            'Banco' => $Banco
        ]);
    }

    public function buscar(Request $request, $id = 0)
    {
        if ($this->permisologia($this->ruta() . '/restaurar') || $this->permisologia($this->ruta() . '/destruir')) {
            $Banco = Banco::withTrashed()->find($id);
        } else {
            $Banco = Banco::find($id);
        }

        if ($Banco) {
            return array_merge($Banco->toArray(), [
                's' => 's',
                'msj' => trans('controller.buscar')
            ]);
        }

        return trans('controller.nobuscar');
    }

    public function guardar(BancoRequest $request, $id = 0)
    {
        DB::beginTransaction();
        try{
            $Banco = $id == 0 ? new Banco() : Banco::find($id);

            $Banco->fill($request->all());
            $Banco->save();
        } catch(QueryException $e) {
            DB::rollback();
            //return response()->json(['s' => 's', 'msj' => $e->getMessage()], 500);
            return ['s' => 'n', 'msj' => $e->getMessage()];
        } catch(Exception $e) {
            DB::rollback();
            return ['s' => 'n', 'msj' => $e->errorInfo[2]];
        }
        DB::commit();

        return [
            'id'    => $Banco->id,
            'texto' => $Banco->nombre,
            's'     => 's',
            'msj'   => trans('controller.incluir')
        ];
    }

    public function eliminar(Request $request, $id = 0)
    {
        try{
            Banco::destroy($id);
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
            Banco::withTrashed()->find($id)->restore();
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
            Banco::withTrashed()->find($id)->forceDelete();
        } catch (QueryException $e) {
            return ['s' => 'n', 'msj' => $e->getMessage()];
        } catch (Exception $e) {
            return ['s' => 'n', 'msj' => $e->errorInfo[2]];
        }

        return ['s' => 's', 'msj' => trans('controller.destruir')];
    }

    public function datatable(Request $request)
    {
        $sql = Banco::select([
            'id', 'nombre_banco', 'deleted_at'
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