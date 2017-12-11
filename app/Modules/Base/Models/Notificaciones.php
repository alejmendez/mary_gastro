<?php
namespace marygastro\Modules\Base\Models;

use marygastro\Modules\Base\Models\Modelo;
use marygastro\Modules\Base\Models\Personas;
use marygastro\Modules\Base\Models\PersonasCorreo;
use marygastro\Modules\Base\Models\Usuario;


use Carbon\Carbon;

class Notificaciones extends Modelo
{
	protected $table = 'notificaciones';
    protected $fillable = ["usuario_id","enviado_id","mensaje_id","visto","tipo_notificacion_id","operacion_id","created_at"];
    protected $campos = [];

   /*  public static function boot(){
        parent::boot();

        static::created(function($model) {
            $usuario = Usuario::find($model->enviado_id); ;
            $usuario_recibe = Usuario::find($model->usuario_id);
            $correo = PersonasCorreo::where('personas_id',$model->enviado_id)
            ->where('principal', 1)->first();

            \Mail::send("pagina::emails.notificacion", [
                'usuario' => $usuario,
                'mensaje' => $model->mensaje->mensaje . ' de ' . $usuario_recibe->personas->nombres
            ], function($message) use($usuario, $correo) {
                $message->from('info@marygastro.com.ve', 'www.marygastro.com.ve');
                $message->to($correo->correo, $usuario->personas->nombres)
                ->subject("NOTIFICACION DEL SISTEMA ONLINE MARY GASTRO.");
            });

            return true;
        });
    }   
 */
    public function usuario()
    {
        //return Usuario::find(Estructura::find($this->usuario_id)->usuario_id);
    } 
    public function enviado()
    {
        $usuario = Usuario::find($this->enviado_id);
        if ($usuario && $usuario->personas) {
            return $usuario->personas->nombres;
        }
        return '';
    }  
    public function mensaje()
    {
        return $this->belongsTo('marygastro\Modules\Base\Models\Mensaje', 'mensaje_id');
    }
    public function TipoNotificacion()
    {
        return $this->belongsTo('marygastro\Modules\Base\Models\TipoNotificacion', 'tipo_notificacion_id');
    }
  
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d/m/Y H:m:s');         
    }
  
}