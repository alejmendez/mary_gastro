<?php

namespace marygastro\Modules\Incidencias\Models;

use marygastro\Modules\Base\Models\Modelo;


class IncidenciasChat extends modelo
{
    protected $table    = 'incidencias_chat';
    protected $fillable = ['incidencias_id','personas_id','msj','archivo','created_at'];
    

    public function personas()
	{
        return $this->belongsTo('marygastro\Modules\Base\Models\Personas', 'personas_id');
    }
}

