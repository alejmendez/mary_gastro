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
//use marygastro\Modules\Noticias\Http\Requests\TipsRequest;

//Modelos
use marygastro\Modules\Noticias\Models\Tips;

class TipsController extends Controller
{
    protected $titulo = 'Tips';

    public $js = [
        'Tips'
    ];

    public $css = [
        'Tips'
    ];

    public $librerias = [
        'datatables'
    ];

    public function index()
    {
        return $this->view('noticias::Tips', [
            'Tips' => new Tips()
        ]);
    }

    public function nuevo()
    {
        $Tips = new Tips();
        return $this->view('noticias::Tips', [
            'layouts' => 'base::layouts.popup',
            'Tips' => $Tips
        ]);
    }

    public function cambiar(Request $request, $id = 0)
    {
        $Tips = Tips::find($id);
        return $this->view('noticias::Tips', [
            'layouts' => 'base::layouts.popup',
            'Tips' => $Tips
        ]);
    }

    public function buscar(Request $request, $id = 0)
    {
        if ($this->permisologia($this->ruta() . '/restaurar') || $this->permisologia($this->ruta() . '/destruir')) {
            $Tips = Tips::withTrashed()->find($id);
        } else {
            $Tips = Tips::find($id);
        }

        if ($Tips) {
            return array_merge($Tips->toArray(), [
                's' => 's',
                'msj' => trans('controller.buscar')
            ]);
        }

        return trans('controller.nobuscar');
    }

    public function guardar(request $request, $id = 0)
    {
        DB::beginTransaction();
        try{
            $Tips = $id == 0 ? new Tips() : Tips::find($id);
            $Tips->fill($request->all());
            $Tips->save();
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
            'id'    => $Tips->id,
            'texto' => $Tips->titulo,
            's'     => 's',
            'msj'   => trans('controller.incluir')
        ];
    }

    public function eliminar(Request $request, $id = 0)
    {
        try{
            Tips::destroy($id);
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
            Tips::withTrashed()->find($id)->restore();
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
            Tips::withTrashed()->find($id)->forceDelete();
        } catch (QueryException $e) {
            return ['s' => 'n', 'msj' => $e->getMessage()];
        } catch (Exception $e) {
            return ['s' => 'n', 'msj' => $e->errorInfo[2]];
        }

        return ['s' => 's', 'msj' => trans('controller.destruir')];
    }

    public function datatable(Request $request)
    {
        $sql = Tips::select([
            'id', 'titulo',  'deleted_at'
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
