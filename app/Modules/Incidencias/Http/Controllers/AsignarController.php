<?php
namespace marygastro\Modules\Incidencias\Http\Controllers;

//Controlador Padre
use marygastro\Modules\Incidencias\Http\Controllers\Controller;

//Dependencias
use DB;
use marygastro\Http\Requests\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Database\QueryException;

//Request
use marygastro\Modules\Incidencias\Http\Requests\AsignarRequest;

//Modelos
use marygastro\Modules\Base\Models\Usuario;

class AsignarController extends Controller
{
    protected $titulo = 'Asignar';

    public $js = [
        'Asignar'
    ];
    
    public $css = [
        'Asignar'
    ];

    public function index()
    {
        $usuarios  = [];
        $_usuarios = Usuario::select('app_usuario.id', 'personas.nombres')->leftJoin('personas', 'personas_id', '=', 'personas.id')
            ->where('perfil_id', 9)
            ->orderBy('personas.nombres')
            ->get();
        foreach ($_usuarios as $usuario) {
            $usuarios[$usuario->id] = $usuario->nombres;
        }

        return $this->view('incidencias::Asignar', [
            'usuarios' => $usuarios
        ]);
    }

    public function guardar(AsignarRequest $request, $id = 0)
    {
        DB::beginTransaction();
        try {
            $usuario = Usuario::findOrFail($id);
            
            $usuario->consultas = $request->consultas;
            $usuario->save();
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
            's'     => 's',
            'msj'   => trans('controller.incluir')
        ];
    }

    public function buscar(Request $request, $id = 0)
    {
        $usuario = Usuario::findOrFail($id);

        return [
            'consultas' => $usuario->consultas
        ];
    }
}
