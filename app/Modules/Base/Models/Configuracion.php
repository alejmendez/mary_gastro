<?php

namespace marygastro\Modules\Base\Models;

use marygastro\Modules\Base\Models\Modelo;

class Configuracion extends Modelo
{
	protected $table = 'configuracion';
    protected $fillable = ['propiedad', 'valor'];

    static protected $conf = [];

    static function get($propiedad)
    {
    	$propiedad = strtolower($propiedad);
    	if (empty(self::$conf)){
    		$rs = self::all();
    		foreach ($rs as $fila) {
    			self::$conf[strtolower($fila->propiedad)] = $fila->valor;
    		}
    	}

    	return isset(self::$conf[$propiedad]) ? self::$conf[$propiedad] : '';
    }
}