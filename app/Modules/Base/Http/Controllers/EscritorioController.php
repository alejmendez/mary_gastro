<?php

namespace marygastro\Modules\Base\Http\Controllers;

use marygastro\Modules\Base\Http\Controllers\Controller;
use marygastro\Modules\Base\Models\Usuario;



use marygastro\Modules\Base\Models\Personas;
use marygastro\Modules\Base\Models\PersonasTelefono;
use marygastro\Modules\Base\Models\PersonasCorreo;

class EscritorioController extends Controller {
    public $autenticar = false;

    protected $titulo = 'Escritorio';
    protected $prefijo = 'backend';

    public function __construct() {
        parent::__construct();

        $this->middleware('auth');
    }

    public function getIndex() {
        $user = \Auth::user();
      

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

        \Mail::send("pagina::emails.bienvenido", [
            'usuario' => $user,
            'mensaje' => 'Bienvenido a Marygastro.com.ve'
        ], function($message) use($user, $data) {
            $message->from('info@marygastro.com.ve', 'www.marygastro.com.ve');
            $message
                //->to($data['correo'], $user->personas->nombres)
                ->to('alejmendez.87@gmail.com', 'Alejandro')
                ->to('leonardoberi21@gmail.com', 'Leonardo')
                ->subject("Bienvenido a Mary Gastro");
        });
        /*
        if($user->super == 's'){
            return $this->view('base::Escritorio');
        }
        */
        
        if($user->perfil->nombre == "Usuarios") {
            return redirect($this->prefijo . '/incidencias/inicio/usuarios');
        }
        if($user->perfil->nombre == "Tecnicos") {
            return redirect($this->prefijo . '/incidencias/escritorios/tecnicos');
        }
        
        if ($pase >= 1){
            return $this->view('base::Escritorio');
        } else {
            return $this->view('base::Escritorio');
        }
    }
}