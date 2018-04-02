<?php
namespace marygastro\Modules\Cms\Http\Controllers;

//Controlador Padre
use marygastro\Modules\Cms\Http\Controllers\Controller;

//Dependencias
use DB;
use marygastro\Http\Requests\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Database\QueryException;

//Request
use marygastro\Modules\Cms\Http\Requests\TestimoniosRequest;

//Modelos
use marygastro\Modules\Cms\Models\Testimonios;

class TestimoniosController extends Controller
{
    protected $titulo = 'Testimonios';

    public $js = [
        'Testimonios'
    ];
    
    public $css = [
        'Testimonios'
    ];

    public $librerias = [
        'datatables',
        'ckeditor',
    ];

    public function index()
    {
        return $this->view('cms::Testimonios', [
            'Testimonios' => new Testimonios()
        ]);
    }

    public function nuevo()
    {
        $Testimonios = new Testimonios();
        return $this->view('cms::Testimonios', [
            'layouts' => 'base::layouts.popup',
            'Testimonios' => $Testimonios
        ]);
    }

    public function cambiar(Request $request, $id = 0)
    {
        $Testimonios = Testimonios::find($id);
        return $this->view('cms::Testimonios', [
            'layouts' => 'base::layouts.popup',
            'Testimonios' => $Testimonios
        ]);
    }

    public function buscar(Request $request, $id = 0)
    {
        if ($this->permisologia($this->ruta() . '/restaurar') || $this->permisologia($this->ruta() . '/destruir')) {
            $Testimonios = Testimonios::withTrashed()->find($id);
        } else {
            $Testimonios = Testimonios::find($id);
        }

        if ($Testimonios) {
            return array_merge($Testimonios->toArray(), [
                's' => 's',
                'msj' => trans('controller.buscar')
            ]);
        }

        return trans('controller.nobuscar');
    }

    public function guardar(TestimoniosRequest $request, $id = 0)
    {
        DB::beginTransaction();
        try {
            $Testimonios = $id == 0 ? new Testimonios() : Testimonios::find($id);
            
            $data = $request->all();
            
            $imagen = $request->file('imagen');
            $ruta = public_path('archivos/testimonios/');

            do {
                $nombre_archivo = str_random(10) . '.' . $imagen->getClientOriginalExtension();
            } while (is_file($ruta . $nombre_archivo));

            $mover = $imagen->move($ruta, $nombre_archivo);
            $data['imagen'] = $nombre_archivo;

            $Testimonios->fill($data);
            $Testimonios->save();
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
            'id'    => $Testimonios->id,
            'texto' => $Testimonios->nombre,
            's'     => 's',
            'msj'   => trans('controller.incluir')
        ];
    }

    public function eliminar(Request $request, $id = 0)
    {
        try {
            Testimonios::destroy($id);
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
            Testimonios::withTrashed()->find($id)->restore();
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
            Testimonios::withTrashed()->find($id)->forceDelete();
        } catch (QueryException $e) {
            return ['s' => 'n', 'msj' => $e->getMessage()];
        } catch (Exception $e) {
            return ['s' => 'n', 'msj' => $e->errorInfo[2]];
        }

        return ['s' => 's', 'msj' => trans('controller.destruir')];
    }

    public function datatable(Request $request)
    {
        $sql = Testimonios::select([
            'id', 'titulo', 'descripcion', 'imagen', 'deleted_at'
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
