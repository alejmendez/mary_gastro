<?php namespace marygastro\Modules\Pagina\Http\Controllers;

use DB;
use Carbon\Carbon;

//Dependencias
use Illuminate\Http\Request;
use Mail;
use Sesion;
use Redirect;

use marygastro\Modules\Pagina\Http\Controllers\Controller;

class Controller extends Controller
{
    public $titulo = 'marygastro';

    public function send(Request $request)
    {
        \Mail::send("pagina::emails.mail", ['data' => ''], function ($message) use ($usuario) {
            $message->from('no_responder@marygastro', 'marygastro');
            $message->to('info@marygastro', 'marygastro')
                ->subject("Asusto del mail.");
        });

        return 'correo enviado satisfactoriamente';
    }
}
