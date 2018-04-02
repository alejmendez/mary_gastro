<?php

namespace marygastro\Modules\Noticias\Models;

use marygastro\Modules\Base\Models\Modelo;
use marygastro\Modules\Noticias\Models\Noticias;

class imagenes extends Modelo
{
    protected $table = 'imagenes';
    protected $fillable = ['noticias_id', 'archivo', 'archivo', 'tamano', 'descripcion', 'leyenda'];

    public function noticias()
    {
        // belongsTo = "pertenece a" | hace relacion desde el detalle hasta el maestro
        return $this->belongsTo('marygastro\Modules\Noticias\Models\Noticias');
    }
}
