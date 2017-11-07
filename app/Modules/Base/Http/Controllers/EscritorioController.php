<?php

namespace marygastro\Modules\Base\Http\Controllers;

use marygastro\Modules\Base\Http\Controllers\Controller;

class EscritorioController extends Controller {
	public $autenticar = false;

	protected $titulo = 'Escritorio';
	protected $prefijo = 'backend';
	public function __construct() {
		parent::__construct();

		$this->middleware('auth');
	}

	public function getIndex() {
		$permisos = [
			'incidencias/inicio/usuarios',
			'incidencias/escritorios/tecnicos',
			
		];
		$pase = 0;
		$ultimoPermiso = '';
		foreach ($permisos as $permiso) {
			
			if ($this->permisologia($permiso)) {
				$pase++;
				$ultimoPermiso = $permiso;
			}
		}
		/* if(\Auth::user()->super == 's'){
			
			return $this->view('base::Escritorio');
		} */
		
		if(\Auth::user()->perfil->nombre == "Usuarios") {
			return redirect($this->prefijo . '/incidencias/inicio/usuarios');
		}
		if(\Auth::user()->perfil->nombre == "Tecnicos") {
			return redirect($this->prefijo . '/incidencias/escritorios/tecnicos');
		}
		
		if ($pase >= 1){
			
			return $this->view('base::Escritorio');
		} else {
			
			return $this->view('base::Escritorio');
		}
	}
}