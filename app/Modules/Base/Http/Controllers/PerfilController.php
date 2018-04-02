<?php namespace marygastro\Modules\Base\Http\Controllers;

use marygastro\Modules\Base\Http\Controllers\Controller;

use DB;
use Validator;

//Request
use marygastro\Http\Requests\Request;
use marygastro\Modules\Base\Http\Requests\PerfilRequest;

//Modelos
use marygastro\Modules\Base\Models\Usuario;
use marygastro\Modules\Base\Models\Personas;
use marygastro\Modules\Base\Models\PersonasDetalles;
use marygastro\Modules\Base\Models\PersonasDireccion;

use marygastro\Modules\Base\Models\PersonasTelefono;
use marygastro\Modules\Base\Models\PersonasCorreo;
use marygastro\Modules\Base\Models\TipoTelefono;

use marygastro\Modules\Base\Models\Estados;
use marygastro\Modules\Base\Models\Municipio;
use marygastro\Modules\Base\Models\Parroquia;
use marygastro\Modules\Base\Models\Ciudades;
use marygastro\Modules\Base\Models\Sector;

class PerfilController extends Controller
{
    protected $titulo = 'Perfil';

    public $autenticar = false;
    public $css = [
        'Perfil'
    ];
    public $js = [
        'Perfil'
    ];

    public $librerias = [
        'alphanum',
        'maskedinput',
        'template',
        'jquery-ui',
        'jquery-ui-timepicker'
    ];

    public function index()
    {
        return $this->view('base::Perfil', [
            'Personas' => new Personas(),
            'Personas_detalles' => new PersonasDetalles(),
            'Personas_direccion' => new PersonasDireccion()
        ]);
    }

    public function principal()
    {
        return ['No', 'Si'];
    }

    public function buscar(Request $request, $id = 0)
    {
        $Personas = Personas::with('personadetalle', 'personadireccion')->find($id);
        
        $datos = [
                "id"                => $id,
                "tipo_persona_id"   => $Personas->tipo_persona_id,
                "dni"               => $Personas->dni,
                "nombres"           => $Personas->nombres,
                "foto"              => $Personas->foto,
            ];

        if (!is_null($Personas->personadireccion)) {
            $datos = array_merge($datos, [
                    "estados_id"        => $Personas->personadireccion->estados_id,
                    "ciudades_id"       => $Personas->personadireccion->ciudades_id,
                    "municipios_id"      => $Personas->personadireccion->municipios_id,
                    "parroquias_id"      => $Personas->personadireccion->parroquias_id,
                    "sectores_id"         => $Personas->personadireccion->sectores_id,
                    "direccion"         => $Personas->personadireccion->direccion,

                    "profesion_id"      => $Personas->personadetalle->profesion_id,
                    "sexo"              => $Personas->personadetalle->sexo,
                    "fecha_nacimiento"  => $Personas->personadetalle->fecha_nacimiento
                ]);
        }
        if (!is_null($Personas->personadetalle)) {
            $datos = array_merge($datos, [
                    "profesion_id"      => $Personas->personadetalle->profesion_id,
                    "sexo"              => $Personas->personadetalle->sexo,
                    "fecha_nacimiento"  => $Personas->personadetalle->fecha_nacimiento
                ]);
        }

          
        if ($Personas) {
            return array_merge($datos, [
                's' => 's',
                'msj' => trans('controller.buscar')
            ]);
        }

        return trans('controller.nobuscar');
    }

    protected function personas($request, $id)
    {
        return [
            "tipo_persona_id" => $request->tipo_persona_id,
            "dni"             => $request->dni,
            "nombres"         => $request->nombres
        ];
    }

    public function guardar(Request $request, $id = 0)
    {
        DB::beginTransaction();
        try {
            $Personas = $id == 0 ? new Personas() : Personas::find($id);
    
            $datos = $this->personas($request, $id);

            $Personas->fill($datos);
            $Personas->save();

            if ($request->tipo_persona_id == 1 || $request->tipo_persona_id == 2) {
                PersonasDetalles::updateOrCreate(
                    ['personas_id' => $Personas->id],
                    ['profesion_id' => $request->profesion_id,
                     'sexo'=> $request->sexo,
                     'fecha_nacimiento'=>$request->fecha_nacimiento
                ]
                );
            }

            if ($request->estados_id !='') {
                PersonasDireccion::updateOrCreate(
                    ['personas_id' => $Personas->id],
                    [
                        "estados_id"    => $request->estados_id,
                        "ciudades_id"   => $request->ciudades_id,
                        "municipios_id"  => $request->municipios_id,
                        "parroquias_id"  => $request->parroquias_id,
                        "sectores_id"     => $request->sectores_id,
                        "direccion"     => $request->direccion
                    ]
                );
            }


            if ($request->tipo_telefono[0] != '') {
                $this->telefono_actulizar($request->all(), $Personas->id);
            }

            if ($request->correo[0] != '') {
                $this->correo_actulizar($request->all(), $Personas->id);
            }
        } catch (QueryException $e) {
            DB::rollback();
            return $e->getMessage();
        } catch (Exception $e) {
            DB::rollback();
            return $e->errorInfo[2];
        }
        DB::commit();

        return [
            'id'    => $Personas->id,
            'texto' => $Personas->nombre,
            's'     => 's',
            'msj'   => trans('controller.incluir')
        ];
    }

    public function telefono_actulizar($request, $id)
    {
        DB::beginTransaction();
        try {
            $datos = [];
            foreach ($request['tipo_telefono'] as $_id => $bancos) {
                if ($bancos==" ") {
                    continue;
                }

                $datos= [
                    'personas_id'       => $id,
                    'principal'         => $request['principal_tlf'][$_id],
                    'tipo_telefono_id'  => $request['tipo_telefono'][$_id],
                    'numero'            => $request['numero'][$_id]
                ];
                
                if ($request['id_telefonos'][$_id]==0) {
                    PersonasTelefono::create($datos);
                } else {
                    PersonasTelefono::find($request['id_telefonos'][$_id])->update($datos);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            return $e->errorInfo[2];
        }

        DB::commit();

        return ['s' => 's', 'msj' => trans('controller.incluir')];
    }

    public function correo_actulizar($request, $id)
    {
        DB::beginTransaction();
        try {
            $datos = [];
            foreach ($request['correo'] as $_id => $bancos) {
                if ($bancos==" ") {
                    continue;
                }

                $datos= [
                    'personas_id'  => $id,
                    'principal'    => $request['principal_correo'][$_id],
                    'correo'       => $request['correo'][$_id]
                ];
                
                if ($request['id_correo'][$_id]==0) {
                    PersonasCorreo::create($datos);
                } else {
                    PersonasCorreo::find($request['id_correo'][$_id])->update($datos);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            return $e->errorInfo[2];
        }

        DB::commit();

        return ['s' => 's', 'msj' => trans('controller.incluir')];
    }

    public function clave(Request $request)
    {
        $usuario = auth()->user();
        
        if ($usuario->super !== 's') {
            $validator = Validator::make($request->all(), [
                'password' => ['required', 'confirmed', 'password', 'min:8', 'max:50'],
            ]);

            if ($validator->fails()) {
                return response($validator->errors(), 422);
            }
        }

        try {
            $usuario = usuario::find($usuario->id);
            $usuario->password = $request->password;
            $usuario->save();
        } catch (Exception $e) {
            return $e->errorInfo[2];
        }

        return ['s' => 's', 'msj' => trans('controller.incluir')];
    }

    public function cambio(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => ['mimes:jpeg,png,jpg'],
        ]);

        if ($validator->fails()) {
            return response($validator->errors(), 422);
        }
        
        $usuario = auth()->user();

        $file = $request->file('foto');
        $name = $usuario->usuario.'.'.$file->getClientOriginalExtension();
        $path = public_path('img/usuarios/');

        $file->move($path, $name);
        $filename = $path . $name;

        chmod($filename, 0777);

      
        Personas::find($usuario->personas_id)->update([
            'foto' => $name
        ]);

        return ['s' => 's', 'msj' => trans('controller.incluir'), 'foto' => url('public/img/usuarios/' . $name)];
    }

    public function ciudades(Request $request)
    {
        $sql = Ciudades::where('estados_id', $request->id)
            ->pluck('nombre', 'id')
            ->toArray();

        $salida = ['s' => 'n' , 'msj'=> 'el estado no Contiene ciudades'];
        
        if ($sql) {
            $salida = ['s' => 's' , 'msj'=> 'Ciudades encontrados', 'ciudades_id'=> $sql];
        }
        
        return $salida;
    }
    
    public function municipios(Request $request)
    {
        $sql = Municipio::where('estados_id', $request->id)
            ->pluck('nombre', 'id')
            ->toArray();

        $salida = ['s' => 'n' , 'msj'=> 'el estado no Contiene municipios'];
        
        if ($sql) {
            $salida = ['s' => 's' , 'msj'=> 'Municipios encontrados', 'municipio_id'=> $sql];
        }
        
        return $salida;
    }

    public function parroquias(Request $request)
    {
        $sql = Parroquia::where('municipio_id', $request->id)
            ->pluck('nombre', 'id')
            ->toArray();

        $salida = ['s' => 'n' , 'msj'=> 'el municipio no Contiene parroquias'];
        
        if ($sql) {
            $salida = ['s' => 's' , 'msj'=> 'Paroquias encontrados', 'parroquia_id'=> $sql];
        }
        
        return $salida;
    }

    public function sectores(Request $request)
    {
        $sql = Sector::where('parroquia_id', $request->id)
            ->pluck('nombre', 'id')
            ->toArray();

        $salida = ['s' => 'n' , 'msj'=> 'La parroquia no Contiene sectores'];
        
        if ($sql) {
            $salida = ['s' => 's' , 'msj'=> 'Sectores encontrados', 'sector_id'=> $sql];
        }
        
        return $salida;
    }

    public function tipotelefono()
    {
        return TipoTelefono::pluck('nombre', 'id');
    }
    
    public function personastelefono(Request $request)
    {
        $telefonos = PersonasTelefono::where('personas_id', $request->id)->get();
        return ['datos' =>$telefonos->toArray()];
    }

    public function personascorreos(Request $request)
    {
        $correos = PersonasCorreo::where('personas_id', $request->id)->get();
        return ['datos' =>$correos->toArray()];
    }
}
