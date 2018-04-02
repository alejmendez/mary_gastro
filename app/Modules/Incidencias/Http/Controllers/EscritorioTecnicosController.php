<?php
namespace marygastro\Modules\Incidencias\Http\Controllers;

//Dependencias
use DB;
use URL;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
//Controlador Padre
use marygastro\Modules\Incidencias\Http\Controllers\Controller;

//Request
use marygastro\Http\Requests\Request;


//Modelos
use marygastro\Modules\Incidencias\Models\Incidencias;

class EscritorioTecnicosController extends Controller
{
    protected $titulo = 'Escritorio';

    public $js = ['escritoriotecnico'];
    public $css = [''];

    public $librerias = [
        'alphanum',
        'maskedinput',
        'datatables',
    ];

    public function index()
    {
        $Incidencias_activas = Incidencias::where('cierre', null)->count();

        $casos_resultos = Incidencias::where('cierre', '!=', '')->count();
    
        return $this->view('incidencias::escritoriotecnicos', [
            'incidencias_activas' => $Incidencias_activas,
            'casos_resultos'	  => $casos_resultos
        ]);
    }
    
    public function activas(Request $request)
    {
        $sql = Incidencias::select([
            'incidencias.id','personas.nombres', 'personas.dni','incidencias.estatus', 'incidencias.caso','incidencias.created_at'
        ])->leftJoin('personas', 'personas.id', '=', 'incidencias.personas_id')
        ->where('incidencias.cierre', null);
     
        return Datatables::of($sql)
            ->setRowId('id')
            ->setRowClass(function ($registro) {
                return  'apuntador';
            })
            ->editColumn('incidencias.created_at', function ($sql) {
                return Carbon::parse($sql->created_at)->format('d/m/Y');
            })
            ->editColumn('incidencias.estatus', function ($sql) {
                switch ($sql->estatus) {
                   case 0:
                       return "En respera de respuesta";
                       break;
                   case 1:
                       return "Caso Resulto";
                       break;
                   
                   default:
                       return "En espera de confirmacion";
                       break;
               }
            })
            ->make(true);
    }
    public function cerrados(Request $request)
    {
        $sql = Incidencias::select([
            'incidencias.id','personas.nombres', 'personas.dni','incidencias.estatus', 'incidencias.cierre','incidencias.caso','incidencias.created_at'
        ])->leftJoin('personas', 'personas.id', '=', 'incidencias.personas_id')
        ->where('incidencias.cierre', '!=', null);
     
        return Datatables::of($sql)
            ->setRowId('id')
            ->setRowClass(function ($registro) {
                return  'apuntador';
            })
            ->editColumn('incidencias.created_at', function ($sql) {
                return Carbon::parse($sql->created_at)->format('d/m/Y');
            })
             ->editColumn('incidencias.cierre', function ($sql) {
                 if ($sql->cierre == '') {
                     return '';
                 }
                 return Carbon::parse($sql->cierre)->format('d/m/Y');
             })
            ->editColumn('incidencias.estatus', function ($sql) {
                switch ($sql->estatus) {
                   case 0:
                       return "En respera de respuesta";
                       break;
                   case 1:
                       return "Caso Resulto";
                       break;
                   
                   default:
                       return "En espera de confirmacion";
                       break;
               }
            })
            ->make(true);
    }
}
