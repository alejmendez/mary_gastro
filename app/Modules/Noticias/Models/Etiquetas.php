<?php

namespace marygastro\Modules\Noticias\Models;

use marygastro\Modules\Base\Models\Modelo;



class Etiquetas extends Modelo
{
    protected $table = 'etiquetas';
    protected $fillable = ['noticias_id', 'etiquetas_id'];

    protected $primaryKey = null;
    public $incrementing = false;

    protected $hidden = ['created_at', 'updated_at'];


}
