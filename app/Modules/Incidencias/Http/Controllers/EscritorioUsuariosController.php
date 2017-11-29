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
use marygastro\Modules\Base\Models\Usuario;
use marygastro\Modules\Incidencias\Models\Incidencias;

class EscritorioUsuariosController extends Controller {
	protected $titulo = 'Escritorio';

	public $js = ['escritoriousuario.js'];
	public $css = [''];

	public $librerias = [
		'alphanum', 
		'maskedinput', 
		'datatables',
	];

	public function index() {	
		$casos_resultos = Incidencias::where('cierre', '!=','')->count();
		return $this->view('incidencias::escritoriousuarios',[
			'consultas' => Usuario::find(\Auth::user()->id)->consultas,
			'casos_resultos' => $casos_resultos
		]);
	}
	
	public function datatable(Request $request){
        
        $sql = Incidencias::select([
            'id','personas_id','cierre', 'estatus', 'caso', 'descripcion','created_at'   
        ])->where('personas_id',\Auth::user()->personas_id);
     
        return Datatables::of($sql)
            ->setRowId('id')
            ->setRowClass(function ($registro) {
                return  'apuntador';
            })
            ->editColumn('created_at', function($sql) {  
                return Carbon::parse($sql->created_at)->format('d/m/Y');
            }) 
            ->editColumn('cierre', function($sql) { 
				if($sql->cierre == ''){
					return '';
				} 
                return Carbon::parse($sql->cierre)->format('d/m/Y');
            }) 
            ->editColumn('estatus', function($sql) {  
               switch ($sql->estatus) {
				   case 0:
					   return "En respera de respuesta";
					   break;
				   case 1:
					   return "Caso Resultos";
					   break;
				   
				   default:
					   return "En espera de confirmacion";
					   break;
			   }
            }) 
            ->make(true);
    } 
    
}