<?php 

namespace marygastro\Modules\Base\Models;

use marygastro\Modules\Base\Models\Modelo;

class Perfil extends Modelo
{
    protected $table = 'app_perfil';
    protected $fillable = ['nombre'];

    public function permisos()
    {
        return $this->hasMany('marygastro\Modules\Base\Models\PerfilesPermisos', 'perfil_id');
        
        // hasMany = "tiene muchas" | hace relacion desde el maestro hasta el detalle
        //return $this->hasMany('marygastro\Modules\Base\Models\App_usuario_permisos');
    }

    public function usuarios()
    {
        return $this->hasMany('marygastro\Modules\Base\Models\Usuario', 'perfil_id');
        
        // hasMany = "tiene muchas" | hace relacion desde el maestro hasta el detalle
        //return $this->hasMany('marygastro\Modules\Base\Models\App_usuario_permisos');
    }
}
