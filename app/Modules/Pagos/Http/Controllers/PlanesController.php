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
use marygastro\Modules\Pagos\Http\Requests\PlanesRequest;

//Modelos
use marygastro\Modules\Pagos\Models\Planes;

class PlanesController extends Controller
{
    protected $titulo = 'Planes';

    public $js = [
        'Planes'
    ];
    
    public $css = [
        'Planes'
    ];

    public $librerias = [
        'datatables'
    ];

    public function index()
    {
        return $this->view('pagos::Planes', [
            'Planes' => new Planes()
        ]);
    }

    public function nuevo()
    {
        $Planes = new Planes();
        return $this->view('pagos::Planes', [
            'layouts' => 'base::layouts.popup',
            'Planes' => $Planes
        ]);
    }

    public function cambiar(Request $request, $id = 0)
    {
        $Planes = Planes::find($id);
        return $this->view('pagos::Planes', [
            'layouts' => 'base::layouts.popup',
            'Planes' => $Planes
        ]);
    }

    public function buscar(Request $request, $id = 0)
    {
        if ($this->permisologia($this->ruta() . '/restaurar') || $this->permisologia($this->ruta() . '/destruir')) {
            $Planes = Planes::withTrashed()->find($id);
        } else {
            $Planes = Planes::find($id);
        }

        if ($Planes) {
            return array_merge($Planes->toArray(), [
                's' => 's',
                'msj' => trans('controller.buscar')
            ]);
        }

        return trans('controller.nobuscar');
    }

    public function guardar(PlanesRequest $request, $id = 0)
    {
        DB::beginTransaction();
        try{
            $Planes = $id == 0 ? new Planes() : Planes::find($id);

            $Planes->fill($request->all());
            $Planes->save();
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
            'id'    => $Planes->id,
            'texto' => $Planes->nombre,
            's'     => 's',
            'msj'   => trans('controller.incluir')
        ];
    }

    public function eliminar(Request $request, $id = 0)
    {
        try{
            Planes::destroy($id);
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
            Planes::withTrashed()->find($id)->restore();
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
            Planes::withTrashed()->find($id)->forceDelete();
        } catch (QueryException $e) {
            return ['s' => 'n', 'msj' => $e->getMessage()];
        } catch (Exception $e) {
            return ['s' => 'n', 'msj' => $e->errorInfo[2]];
        }

        return ['s' => 's', 'msj' => trans('controller.destruir')];
    }

    public function datatable(Request $request)
    {
        $sql = Planes::select([
            'id', 'nombre', 'deleted_at'
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