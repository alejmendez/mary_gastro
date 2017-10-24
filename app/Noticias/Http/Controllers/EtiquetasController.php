<?php

namespace marygastro\Modules\Noticias\Http\Controllers;

//Controlador Padre
use marygastro\Modules\Noticias\Http\Controllers\Controller;

//Dependencias
use DB;
use marygastro\Http\Requests\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Database\QueryException;

//Request
use marygastro\Modules\Noticias\Http\Requests\EtiquetasRequest;

//Modelos
use marygastro\Modules\Noticias\Models\Etiquetas;

class EtiquetasController extends Controller
{
    protected $titulo = 'Etiquetas';

    public $js = [
        'Etiquetas'
    ];

    public $css = [
        'Etiquetas'
    ];

    public $librerias = [
        'datatables'
    ];

    public function index()
    {
        return $this->view('noticias::Etiquetas', [
            'Etiquetas' => new Etiquetas()
        ]);
    }

    public function nuevo()
    {
        $Etiquetas = new Etiquetas();
        return $this->view('noticias::Etiquetas', [
            'layouts' => 'base::layouts.popup',
            'Etiquetas' => $Etiquetas
        ]);
    }

    public function cambiar(Request $request, $id = 0)
    {
        $Etiquetas = Etiquetas::find($id);
        return $this->view('noticias::Etiquetas', [
            'layouts' => 'base::layouts.popup',
            'Etiquetas' => $Etiquetas
        ]);
    }

    public function buscar(Request $request, $id = 0)
    {
        if ($this->permisologia($this->ruta() . '/restaurar') || $this->permisologia($this->ruta() . '/destruir')) {
            $Etiquetas = Etiquetas::withTrashed()->find($id);
        } else {
            $Etiquetas = Etiquetas::find($id);
        }

        if ($Etiquetas) {
            return array_merge($Etiquetas->toArray(), [
                's' => 's',
                'msj' => trans('controller.buscar')
            ]);
        }

        return trans('controller.nobuscar');
    }

    public function guardar(EtiquetasRequest $request, $id = 0)
    {
        DB::beginTransaction();
        try{
            $Etiquetas = $id == 0 ? new Etiquetas() : Etiquetas::find($id);

            $Etiquetas->fill($request->all());
            $Etiquetas->save();
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
            'id'    => $Etiquetas->id,
            'texto' => $Etiquetas->nombre,
            's'     => 's',
            'msj'   => trans('controller.incluir')
        ];
    }

    public function eliminar(Request $request, $id = 0)
    {
        try{
            Etiquetas::destroy($id);
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
            Etiquetas::withTrashed()->find($id)->restore();
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
            Etiquetas::withTrashed()->find($id)->forceDelete();
        } catch (QueryException $e) {
            return ['s' => 'n', 'msj' => $e->getMessage()];
        } catch (Exception $e) {
            return ['s' => 'n', 'msj' => $e->errorInfo[2]];
        }

        return ['s' => 's', 'msj' => trans('controller.destruir')];
    }

    public function datatable(Request $request)
    {
        $sql = Etiquetas::select([
            'id', 'nombre', 'slug', 'deleted_at'
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
