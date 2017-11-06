<?php
namespace marygastro\Modules\Incidencias\Http\Controllers;

//Dependencias
use DB;
use URL;
use Yajra\Datatables\Datatables;

//Controlador Padre
use marygastro\Modules\Incidencias\Http\Controllers\Controller;
 
//Request
use marygastro\Http\Requests\Request;


//Modelos
use marygastro\Modules\Base\Models\Usuario;

class EscritorioUsuariosController extends Controller {
	protected $titulo = 'Escritorio';

	public $js = [''];
	public $css = [''];

	public $librerias = [
		'alphanum', 
		'maskedinput', 
		'datatables',
	];

	public function index() {	
		return $this->view('incidencias::escritoriousuarios',[
			'consultas' => Usuario::find(\Auth::user()->id)->consultas,
		]);
    }
    

}