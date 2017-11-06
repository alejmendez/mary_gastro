<?php
namespace marygastro\Modules\Base\Models;

use marygastro\Modules\Base\Models\Modelo;

class Mensaje extends Modelo
{
	protected $table = 'mensaje';
    protected $fillable = ["mensaje"];
    protected $campos = [];
    public function notificaciones(){
        return $this->hasMany('marygastro\Modules\base\Models\Notificaciones', 'tipo_notificacion_id');
        // hasMany = "tiene muchas" | hace relacion desde el maestro hasta el detalle
        //return $this->hasMany('Modules\Admin\Model\App_usuario_permisos');
    } 

    
}