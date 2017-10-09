<?php

namespace marygastro\Modules\Noticias\Models;

use marygastro\Modules\Base\Models\Modelo;

class noticias_categorias extends Modelo
{
    protected $table = 'noticias_categorias';
    protected $fillable = ['noticias_id', 'categorias_id'];

    protected $primaryKey = null;
    public $incrementing = false;

    protected $hidden = ['created_at', 'updated_at'];
}
