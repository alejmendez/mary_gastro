<?php

namespace marygastro\Modules\Noticias\Http\Controllers;

//controlador papito
use marygastro\Modules\Noticias\Http\Controllers\Controller;
//Dependencias
use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\Datatables;
//Request
use marygastro\Modules\Noticias\Http\Requests\CategoriasRequest;
//Modelooos
use marygastro\Modules\Noticias\Models\Categorias;

class CategoriasController extends Controller
{
    protected $titulo = 'Categorías';
    public $js =[
        'Categorias'
    ];
    public $css =[

    ];
    public $librerias = [
        'alphanum',
        'maskedinput',
        'datatables',
        'bootstrap-colorpicker'
    ];

    public function index()
    {
        return $this->view('noticias::Categorias', [
            'Categorias'=> new Categorias()
        ]);
    }
    
    public function nuevo()
    {
        $Categorias = new Categorias();
        return $this->view('noticias::Categorias', [
            'layouts' => 'base::layouts.popup',
            'Categorias' => $Categorias
        ]);
    }

    public function cambiar(Request $request, $id = 0)
    {
        $Categorias = Categorias::find($id);
        return $this->view('noticias::Categorias', [
            'layouts' => 'base::layouts.popup',
            'Categorias' => $Categorias
        ]);
    }

    public function buscar(Request $request, $id = 0)
    {
        if ($this->permisologia($this->ruta() . '/restaurar') || $this->permisologia($this->ruta() . '/destruir')) {
            $categoria = Categorias::withTrashed()->find($id);
        } else {
            $categoria = Categorias::find($id);
        }

        if ($categoria) {
            $respuesta = array_merge($categoria->toArray(), [
                's' => 's',
                'msj' => trans('controller.buscar'),
            ]);

            return $respuesta;
        }

        return trans('controller.nobuscar');
    }

    public function guardar(CategoriasRequest $request, $id = 0)
    {
        DB::beginTransaction();
        try {
            $Categorias = $id == 0 ? new Categorias() : Categorias::find($id);

            $Categorias->fill($request->all());
            $Categorias->save();
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
            'id'    => $Categorias->id,
            'texto' => $Categorias->nombre,
            's'     => 's',
            'msj'   => trans('controller.incluir')
        ];
    }

    public function eliminar(Request $request, $id = 0)
    {
        try {
            $usuario = Categorias::destroy($id);
        } catch (Exception $e) {
            return $e->errorInfo[2];
        }

        return ['s' => 's', 'msj' => trans('controller.eliminar')];
    }

    public function restaurar(Request $request, $id = 0)
    {
        try {
            Categorias::withTrashed()->find($id)->restore();
        } catch (Exception $e) {
            return $e->errorInfo[2];
        }

        return ['s' => 's', 'msj' => trans('controller.restaurar')];
    }

    public function destruir(Request $request, $id = 0)
    {
        try {
            Categorias::withTrashed()->find($id)->forceDelete();
        } catch (Exception $e) {
            return $e->errorInfo[2];
        }

        return ['s' => 's', 'msj' => trans('controller.destruir')];
    }

    public function datatable(Request $request)
    {
        $sql = Categorias::select([
            'id', 'nombre', 'descripcion',
        ]);

        return Datatables::of($sql)->setRowId('id')->make(true);
    }
}
