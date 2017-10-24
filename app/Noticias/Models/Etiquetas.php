<?php

namespace marygastro\Modules\Noticias\Models;

use marygastro\Modules\Base\Models\Modelo;



class Etiquetas extends modelo
{
    protected $table = 'etiquetas';
    protected $fillable = ["nombre","slug"];
    protected $campos = [
    'nombre' => [
        'type' => 'text',
        'label' => 'Nombre',
        'placeholder' => 'Nombre de la Etiqueta'
    ],
    'slug' => [
        'type' => 'text',
        'label' => 'Slug',
        'placeholder' => 'Slug de la Etiqueta'
    ]
];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);

    }

    public function noticias()
    {
        return $this->belongsToMany('marygastro\Modules\Noticas\Models\Noticias', 'noticia_etiqueta');
    }


}
