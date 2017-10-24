<?php

namespace marygastro\Modules\Noticias\Models;

use marygastro\Modules\Base\Models\Modelo;



class Categorias extends Modelo
{
    protected $table = 'categorias';
    protected $fillable = ["nombre","slug","descripcion","color"];
    protected $campos = [
        'nombre' => [
            'type' => 'text',
            'label' => 'Nombre',
            'placeholder' => 'Nombre de la categoría'
        ],
        'slug' => [
            'type' => 'text',
            'label' => 'SLUG',
            'placeholder' => 'Slug de la Categoría'
        ],
        'descripcion' => [
            'type' => 'text',
            'label' => 'Descripción',
            'placeholder' => 'Descripción de la Categoría'
        ],
        'color' => [
            'type' => 'text',
            'label' => 'Color',
            'placeholder' => 'Color de la Categoría'
        ]
    ];

    public function noticias()
    {
        return $this->belongsToMany('marygastro\Modules\Noticas\Models\Noticias', 'noticia_categoria');
    }
}
