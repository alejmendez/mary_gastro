<?php

namespace marygastro\Modules\Base\Http\Controllers;

//Dependencias
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
//Request
use marygastro\Modules\Base\Http\Requests\RegistrarUserRequest;
use marygastro\Modules\Base\Http\Requests\LoginRequest;
use marygastro\Modules\Base\Http\Requests\LoginfotoRequest;
//Controlador Padre
use marygastro\Modules\Base\Http\Controllers\Controller;

//Modelos
use marygastro\Modules\Base\Models\Usuario;
use marygastro\Modules\Base\Models\Personas;
use marygastro\Modules\Base\Models\PersonasCorreo;

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
		$user = Usuario::where('usuario', $data['usuario'])->first();

		if(!$user->verificado){
			return ['s' => 'n', 'msj' => 'Debe verificar su correo para tener acceso'];
		}

		if (!$autenticado) {
			$idregistro = 'Clave:' . $data['password'];
			$data = [
				//'correo' => $data['usuario'],
				'password' => $data['password'],
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

	public function registro(RegistrarUserRequest $request){
		DB::beginTransaction();
		try {
			
			$data = $request->all();
		
			$persona = Personas::create([
				"tipo_persona_id" => 1,
				"dni" => $request->dni,
				"nombres"=> $request->nombres,
				"foto" => 'usuario.png'
			]);
			$data['personas_id'] = $persona->id;

			$code_verificacion = $this->random_string(20);
			$data['perfil_id'] = 9;
			$data['usuario'] = $data['correo'];
			$data['code_autenticacion'] = $code_verificacion;

			PersonasCorreo::create([
				"personas_id" => $data['personas_id'],
				"correo" => $data['correo'],
				"principal" => true
			]);

			
			
			
			$usuario = Usuario::create($data);
			$id = $usuario->id;
			
			/* 
			\Mail::send("pagina::emails.bienvenido", [
                'usuario' => $usuario,
                'mensaje' => 'Bienvenido a Marygastro.com.ve'
            ], function($message) use($usuario, $data) {
                $message->from('info@marygastro.com.ve', 'www.marygastro.com.ve');
                $message->to($data['correo'], $usuario->personas->nombres)
                ->subject("CONFIRMACION DE CORREO MARY GASTRO.");
			}); */
			
			\Mail::send("pagina::emails.confirmacion", [
                'usuario' => $usuario,
                'mensaje' => ' marygastro.com.ve/backend/confirmacion/'. $code_verificacion 
            ], function($message) use($usuario, $data) {
                $message->from('info@marygastro.com.ve', 'www.marygastro.com.ve');
                $message->to($data['correo'], $usuario->personas->nombres)
                ->subject("CONFIRMACION DE CORREO MARY GASTRO.");
            });
			
		} catch (Exception $e) {
			DB::rollback();
			return $e->errorInfo[2];
		}

		DB::commit();

           
		return [
			'id' => $usuario->id, 
			'texto' => $usuario->nombre, 
			's' => 's', 
			'msj' => trans('controller.incluir')
		];
	}

	protected function random_string($length = 10) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }
}