<?php

namespace marygastro\Modules\Base\Model;

use Illuminate\Database\Eloquent\Model;

class PerfilesPermisos extends Model
{
    protected $table = 'app_perfiles_permisos';
    protected $fillable = ['perfil_id', 'ruta'];

    protected $primaryKey = null;
    public $incrementing = false;

    protected $hidden = ['created_at', 'updated_at'];

    public function perfil()
    {
        // belongsTo = "pertenece a" | hace relacion desde el detalle hasta el maestro
        return $this->belongsTo('marygastro\Modules\Base\Model\Perfil', 'perfil_id');
    }
}
