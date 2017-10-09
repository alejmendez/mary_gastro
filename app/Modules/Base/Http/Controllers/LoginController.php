<?php

namespace marygastro\Modules\Base\Http\Controllers;

//Dependencias
use Illuminate\Support\Facades\Auth;
use Session;

//Request
use marygastro\Modules\Base\Http\Requests\LoginRequest;
use marygastro\Modules\Base\Http\Requests\LoginfotoRequest;
//Controlador Padre
use marygastro\Modules\Base\Http\Controllers\Controller;

//Modelos
use marygastro\Modules\Base\Models\Usuario;
use marygastro\Modules\Base\Models\Personas;

class LoginController extends Controller {
	public $autenticar = false;

	protected $redirectTo = '/';   //antes era /escritorio
	protected $redirectPath = '/';   //antes era /escritorio
	protected $prefijo = '';

	public function __construct() {
		//$this->middleware('guest', ['except' => 'getSalir']);
		$this->prefijo = \Config::get('admin.prefix');

		$this->redirectTo = $this->prefijo . $this->redirectTo;
		$this->redirectPath = $this->prefijo . $this->redirectPath;

		if (Auth::check()) {
			return redirect($this->prefijo . '/');   //antes era /escritorio
		}
	}

	public function index() {
		if (Auth::check()) {
			return redirect($this->prefijo . '/');   //antes era /escritorio
		}

		return $this->view('base::Login');
	}

	public function bloquear() {
		return $this->view('base::Bloquear');
	}

	public function salir() {
		Auth::logout();
		return redirect($this->prefijo . '/login');
	}

	public function validar(LoginRequest $request) {
		$data = $request->only('usuario', 'password');
		$data['usuario'] = strtolower($data['usuario']);
		$autenticado = Auth::attempt($data, $request->recordar());

		$idregistro = '';
		$login = $data['usuario'];

		if (!$autenticado) {
			$idregistro = 'Clave:' . $data['password'];
			$data = [
				//'correo' => $data['usuario'],
				'password' => $data['password']
			];
			
			$autenticado = Auth::attempt($data, $request->recordar());
		}

		if ($autenticado) {
			return ['s' => 's'];
		}

		return ['s' => 'n', 'msj' => 'La combinacion de Usuario y Clave no Concuerdan.'];
	}
	public function foto(LoginfotoRequest $request){
		
		$usuario = $request->usuario;

		$user = Usuario::select('personas_id')->where('usuario','=', $usuario)->first();

		$foto = Personas::select('foto')->where('id','=',$user->personas_id)->first();

		return ['foto'=>$foto->foto];
	}
}