<?php 

namespace marygastro\Modules\Base\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use marygastro\Modules\Base\Model\Modelo;

class Usuario extends Modelo implements AuthenticatableContract, CanResetPasswordContract {
	use Authenticatable, CanResetPassword;
	
	protected $table = 'app_usuario';
	protected $fillable = [
		'usuario', 
		'password',
		'codigo', 
		'super', 
		'perfil_id',
		'persona_id',
		'confirmado'
	];

	protected $hidden = ['password', 'remember_token', 'created_at', 'updated_at'];

	public $permisos = [];

	public function setPasswordAttribute($value){
        $this->attributes['password'] = \Hash::make($value);
    }

    public function setUsuarioAttribute($value){
        $this->attributes['usuario'] = strtolower($value);
    }

    public function setCorreoAttribute($value){
        $this->attributes['correo'] = strtolower($value);
    }

	public function permisos(){
		if (!empty($this->permisos)){
			return $this->permisos;
		}

		$perfiles_permisos = \DB::table('app_perfiles_permisos')
			->select('ruta')
			->leftJoin('app_perfil', 'app_perfil.id', '=', 'app_perfiles_permisos.perfil_id')
			->where('app_perfil.id', $this->perfil_id);

		$usuario_permisos = \DB::table('app_usuario_permisos')
			->select('ruta')
			->leftJoin('app_usuario', 'app_usuario.id', '=', 'app_usuario_permisos.usuario_id')
			->where('app_usuario.id', $this->id)
			->union($perfiles_permisos);

		$this->permisos = $usuario_permisos->get()->pluck('ruta');
		return $this->permisos;
	}

	public function UsuarioPermisos()
	{
		return $this->hasMany('marygastro\Modules\Base\Model\UsuarioPermisos', 'usuario_id');
	}

	public function perfil()
	{
		return $this->belongsTo('marygastro\Modules\Base\Model\Perfil');
	}

	public function persona()
	{
		return $this->hasOne('marygastro\Modules\Base\Model\Personas', 'person_id', 'persona_id');
	}
}
