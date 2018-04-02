<?php

namespace marygastro\Modules\Base\Http\Controllers;

//Dependencias
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
//Request
use Illuminate\Http\Request;

//Controlador Padre
use marygastro\Modules\Base\Http\Controllers\Controller;

//Modelos

class ReporteController extends Controller
{
    public $autenticar = false;

    public function index()
    {
        return $this->view('base::Reporte');
    }
    
    public function reporte(Request $request)
    {
        $email ='soportetmc15@gmail.com';
        
        \Mail::send("pagina::emails.reporte", [
                'nombres' 		=>  $request->nombres,
                'correo'  		=>  $request->correo,
                'descripcion'   =>  $request->descripcion
                
            ], function ($message) use ($email) {
                $message->from('info@marygastro.com.ve', 'www.marygastro.com.ve');
                $message
                    ->to($email, 'Reporte de error')
                    ->subject("Reporte de Error");
            });
        return [
            
            's' => 's',
            //'msj' => 'Hemos enviado un mensaje de confirmación a su correo, por favor ingrese y verifique su cuenta.'
            'msj' => 'Reporte de Error Creado'
        ];
    }
}
