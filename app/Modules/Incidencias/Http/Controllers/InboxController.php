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
use marygastro\Modules\Base\Http\Requests\UsuariosRequest;

//Modelos

use marygastro\Modules\Incidencias\Models\Incidencias;
use marygastro\Modules\Incidencias\Models\IncidenciasChat;
use marygastro\Modules\Base\Models\Usuario;
use marygastro\Modules\Base\Models\Personas;
use marygastro\Modules\Base\Models\PersonasCorreo;
use marygastro\Modules\Base\Models\Mensaje;


class InboxController extends Controller {
	protected $titulo = 'Inbox';
	public $autenticar = false;
	public $js = ['inbox'];
	public $css = ['inbox'];

	public function __construct() {
		parent::__construct();
		$this->middleware('auth');
	}

	public $librerias = [
		'alphanum', 
		'maskedinput', 
		'datatables', 
		
	];

	public function index(Request $request, $id = 0) {
			
		return $this->view('incidencias::inbox',[
			'incidencia' => Incidencias::find($id)
		]);
	}
	public function chats(Request $request) {
			
		$chats = IncidenciasChat::where('incidencias_id', $request->id)->orderBy('id', 'asc');

		$data_chat = [];
		foreach ($chats->get() as $key => $chat) {
			
			if(\Auth::user()->personas_id == $chat->personas_id ){
				$quien ='yo';
			}else{
				$quien ='el';

			}
			if($chat->archivo != '' ){
				$archivo = url('public/img/chat/'.$chat->archivo);
			}else{
				$archivo = '';
			}
			$data_chat[] = [
				'foto'  	=> $chat->personas->foto,
				'msj'   	=> $chat->msj,
				'fecha' 	=> Carbon::parse($chat->created_at)->format('d/m/Y H:i'),
				'archivo'	=> $archivo,
				'quien'		=> $quien,
			];
			
			
		}
		return $data_chat;
	}

	public function msj(Request $request) {

		DB::beginTransaction();
        try{
			$archivo = '';
			if($request->archivo != ""){
				if($file = $request->file('archivo')){
					$foto =  $this->random_string() . '.' . $file->getClientOriginalExtension();

					$path = public_path('img/chat/');
					$file->move($path, $foto);
					chmod($path . $foto, 0777);
				}
				$archivo = $foto;
			}
			

            IncidenciasChat::create([
				'incidencias_id' => $request->incidencia_id,
				'personas_id' 	 => \Auth::user()->personas_id,
				'msj'			 => $request->msj,
				'archivo'        => $archivo
			]);
				//notificacion($tipo,$usuario,$enviado,$mensaje,$operacion_id = '')
				/*$tipo = tipo de Notificacion
				$usuario = el id del user adonde va...
				$mensaje = el id del menseaje...
				$enviado = usuario quien mando la solicitud */

			$user = Incidencias::find($request->incidencia_id);
			
			if(\Auth::user()->personas->id == $user->personas_id){
				$id2 = 2;
				$id = 2;
			}else{
				
				$id = $user->personas_id;
				$_id2 =  Usuario::where('personas_id', $user->personas_id)->first();
				$id2 = $_id2->id;
			}
			
			$this->notificacion(2, $id2, \Auth::user()->id, 2, $request->incidencia_id);

			$usuario = Usuario::find( \Auth::user()->id);
			$usuario_recibe = Usuario::where('personas_id', $id)->first();
			
            $correo = PersonasCorreo::where('personas_id', $id)
            	->where('principal', 1)->first();

			$msj = Mensaje::find(2);

            \Mail::send("pagina::emails.notificacion", [
                'usuario' => $usuario,
                'mensaje' => $msj->mensaje . ' de ' . $usuario_recibe->personas->nombres
            ], function($message) use($usuario, $correo) {
                $message->from('info@marygastro.com.ve', 'www.marygastro.com.ve');
                $message->to($correo->correo, $usuario->personas->nombres)
                ->subject("NOTIFICACION DEL SISTEMA ONLINE MARY GASTRO.");
            });
        } catch(QueryException $e) {
            DB::rollback();
            return $e->getMessage();
        } catch(Exception $e) {
            DB::rollback();
            return $e->errorInfo[2];
        }
        DB::commit();

        return [
            's'     => 's',
            'msj'   => trans('controller.incluir')
        ];
	}

	public function cierre(Request $request){
		DB::beginTransaction();
        try{
			$incidencias = Incidencias::where('id', $request->id)->update([
				'cierre' => Carbon::now()
			]);
        } catch(QueryException $e) {
            DB::rollback();
            return $e->getMessage();
        } catch(Exception $e) {
            DB::rollback();
            return $e->errorInfo[2];
        }
        DB::commit();

        return [
            's'     => 's',
            'msj'   => trans('controller.incluir')
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