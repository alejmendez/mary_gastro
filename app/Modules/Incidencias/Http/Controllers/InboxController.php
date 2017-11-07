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


class InboxController extends Controller {
	protected $titulo = 'Inbox';

	public $js = ['inbox'];
	public $css = ['inbox'];

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
			if($request->archivo !=""){
				
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