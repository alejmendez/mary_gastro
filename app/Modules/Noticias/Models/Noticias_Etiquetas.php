<?php

namespace marygastro\Modules\Noticias\Models;

use marygastro\Modules\Base\Models\Modelo;

class noticias_etiquetas extends Modelo
{
    protected $table = 'noticias_etiquetas';
    protected $fillable = ['noticias_id', 'etiquetas_id'];

    protected $primaryKey = null;
    public $incrementing = false;

    protected $hidden = ['created_at', 'updated_at'];
}
