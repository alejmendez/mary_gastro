<?php

namespace marygastro\Modules\Base\Models;

use marygastro\Modules\Base\Models\Modelo;


use marygastro\Modules\Base\Models\Estados;
use marygastro\Modules\Base\Models\Municipio;
use marygastro\Modules\Base\Models\Parroquia;
use marygastro\Modules\Base\Models\Ciudades;
use marygastro\Modules\Base\Models\Sector;


class PersonasDireccion extends modelo
{
    protected $table = 'personas_direccion';
    protected $fillable = ["personas_id","estados_id","ciudades_id","municipios_id","parroquias_id","sectores_id","direccion"];
    protected $campos = [
        'estados_id' => [
            'type'        => 'select',
            'label'       => 'Estado',
            'placeholder' => '- Eeleccione un Estado',
            'url'         => 'estados'
        ],
        'ciudades_id' => [
            'type'        => 'select',
            'label'       => 'Ciudad',
            'placeholder' => '- Seleccione una Ciudad',
            'url'         => 'ciudades'
        ],
        'municipios_id' => [
            'type'        => 'select',
            'label'       => 'Municipios',
            'placeholder' => '- Seleccione un Municipio',
            'url'         => 'municipio'
        ],
        'parroquias_id' => [
            'type'        => 'select',
            'label'       => 'Parroquia',
            'placeholder' => '- Seleccione una Parroquia',
            'url'         => 'parroquia'
        ],
        'sectores_id' => [
            'type'        => 'select',
            'label'       => 'Sector',
            'placeholder' => '- Seleccione un Sector',
            'url'         => 'sector'
        ],
        'direccion' => [
            'type'        => 'textarea',
            'label'       => 'Direccion',
            'placeholder' => 'Direccion del Personas Direccion',
            'cont_class'  => 'col-sm-12'
        ]
    ];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->campos['estados_id']['options'] = Estados::pluck('nombre', 'id');
        $this->campos['municipios_id']['options'] = Municipio::pluck('nombre', 'id');
        $this->campos['parroquias_id']['options'] = Parroquia::pluck('nombre', 'id');
        $this->campos['ciudades_id']['options'] = Ciudades::pluck('nombre', 'id');
        $this->campos['sectores_id']['options'] = Sector::pluck('nombre', 'id');
    }

    public function persona()
    {
        return $this->belongsTo('marygastro\Modules\Base\Models\Persona', 'personas_id');
    }

    public function estado()
    {
        return $this->belongsTo('marygastro\Modules\Base\Models\Estados', 'estados_id');
    }

    public function municipio()
    {
        return $this->belongsTo('marygastro\Modules\Base\Models\Municipio', 'municipios_id');
    } 

    public function ciudad()
    {
        return $this->belongsTo('marygastro\Modules\Base\Models\Ciudades', 'ciudades_id');
    }

    public function sector()
    {
        return $this->belongsTo('marygastro\Modules\Base\Models\Sector', 'sectores_id');
    }

    public function parroquia()
    {
        return $this->belongsTo('marygastro\Modules\Base\Models\Parroquia', 'parroquias_id');
    }
}