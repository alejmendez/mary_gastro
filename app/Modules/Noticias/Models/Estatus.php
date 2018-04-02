<?php
namespace marygastro\Modules\Noticias\Models;

use marygastro\Modules\Base\Models\Modelo;

class Estatus extends Modelo
{
    protected $table = 'estatus';
    protected $fillable = ["nombre"];
}
