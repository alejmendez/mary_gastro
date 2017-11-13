<?php
namespace marygastro\Modules\Base\Models;

use marygastro\Modules\Base\Models\Modelo;
use marygastro\Modules\Base\Models\Personas;
use marygastro\Modules\Base\Models\Usuario;


use Carbon\Carbon;

class Notificaciones extends Modelo
{
	protected $table = 'notificaciones';
    protected $fillable = ["usuario_id","enviado_id","mensaje_id","visto","tipo_notificacion_id","operacion_id","created_at"];
    protected $campos = [];

   /* public static function boot(){
        parent::boot();

        static::created(function($model) {
            $usuario = Usuario::find(Estructura::find($model->enviado_id)->usuario_id);
            $usuario_recibe = Usuario::find(Estructura::find($model->usuario_id)->usuario_id);

            \Mail::send("pagina::emails.notificacion", [
                'usuario' => $usuario,
                'mensaje' => $model->mensaje->mensaje . ' de ' . $usuario_recibe->nombre
            ], function($message) use($usuario) {
                $message->from('no_responder@dineroland.com', 'Dineroland.com');
                $message->to($usuario->correo, $usuario->nombre)
                    ->subject("NOTIFICACION DEL SISTEMA ONLINE DINEROLAND.");
            });

            $model->historico('creado', $model->id);
            return true;
        });
    }  */

    public function usuario()
    {
        //return Usuario::find(Estructura::find($this->usuario_id)->usuario_id);
    } 
    public function enviado()
    {
        return Usuario::find($this->enviado_id)->personas->nombres;
    }  
    public function mensaje()
    {
        return $this->belongsTo('marygastro\Modules\base\Models\Mensaje', 'mensaje_id');
    }
    public function TipoNotificacion()
    {
        return $this->belongsTo('marygastro\Modules\base\Models\TipoNotificacion', 'tipo_notificacion_id');
    }
  
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d/m/Y H:m:s');         
    }
  
}