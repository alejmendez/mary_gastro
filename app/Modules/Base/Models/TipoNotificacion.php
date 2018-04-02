<?php
namespace marygastro\Modules\Base\Models;

use marygastro\Modules\Base\Models\Modelo;

class TipoNotificacion extends Modelo
{
    protected $table = 'tipo_notificacion';
    protected $fillable = ["nombre","ruta"];
    protected $campos = [];
    
    public function notificaciones()
    {
        return $this->hasMany('marygastro\Modules\base\Models\Notificaciones', 'mensaje_id');
        // hasMany = "tiene muchas" | hace relacion desde el maestro hasta el detalle
        //return $this->hasMany('Modules\Admin\Model\App_usuario_permisos');
    }
}
