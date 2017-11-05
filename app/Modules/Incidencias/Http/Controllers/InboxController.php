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
use marygastro\Modules\Base\Http\Requests\UsuariosRequest;

//Modelos



class InboxController extends Controller {
	protected $titulo = 'Inbox';

	public $js = [''];
	public $css = ['inbox'];

	public $librerias = [
		'alphanum', 
		'maskedinput', 
		'datatables', 
		
	];

	public function index() {	
		return $this->view('incidencias::inbox');
	}
}