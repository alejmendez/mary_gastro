<?php 

namespace marygastro\Modules\Base\Model;
use marygastro\Modules\Base\Model\Modelo;

class Perfil extends Modelo{
	protected $table = 'app_perfil';
	protected $fillable = ['nombre'];

	public function permisos(){
		return $this->hasMany('marygastro\Modules\Base\Model\PerfilesPermisos', 'perfil_id');
		
		// hasMany = "tiene muchas" | hace relacion desde el maestro hasta el detalle
		//return $this->hasMany('marygastro\Modules\Base\Model\App_usuario_permisos');
	}

	public function usuarios(){
		return $this->hasMany('marygastro\Modules\Base\Model\Usuario', 'perfil_id');
		
		// hasMany = "tiene muchas" | hace relacion desde el maestro hasta el detalle
		//return $this->hasMany('marygastro\Modules\Base\Model\App_usuario_permisos');
	}
}
