<?php

namespace marygastro\Modules\Noticias\Models;

use marygastro\Modules\Base\Models\Modelo;
use Carbon\Carbon;

use marygastro\Modules\Base\Models\Usuario;

use marygastro\Modules\Noticias\Models\Imagenes;
use marygastro\Modules\Noticias\Models\Categorias;

class Noticias extends Modelo
{
    protected $table = 'noticias';
    protected $fillable = ["titulo","slug","contenido","categorias_id","contenido_html","resumen","audio","published_at"];
    protected $campos = [
        'titulo' => [
            'type' => 'text',
            'label' => 'Titulo',
            'placeholder' => 'Titulo de la Noticias'
        ],
        'slug' => [
            'type' => 'text',
            'label' => 'Slug',
            'placeholder' => 'Slug del Noticias'
        ],
        'categorias_id' => [
            'type' => 'select',
            'label' => 'Categoria',
            'placeholder' => 'Categoria',
            'url' => 'Noticias/definiciones/categorias',
            'controller' => 'categorias'
        ]
    ];



    public function setPublishedAtAttribute($value){
        $this->attributes['published_at'] = Carbon::createFromFormat('d/m/Y H:i', $value);
    }
    // public function __construct(array $attributes = array())
    // {
    //     parent::__construct($attributes);
    //     $this->campos['categorias_id']['option'] = categorias::pluck('nombre', 'id');
    // }

    protected $dates = ['published_at'];

    public function categorias()
    {
        return $this->belongsToMany('marygastro\Modules\Noticias\Models\Categorias', 'categorias_id');
    }

    public function imagenes(){
        // belongsTo = "pertenece a" | hace relacion desde el detalle hasta el maestro
        return $this->hasMany('marygastro\Modules\Noticias\Models\Imagenes');
    }

    public function estatus(){
        // belongsTo = "pertenece a" | hace relacion desde el detalle hasta el maestro
        return $this->belongsTo('marygastro\Modules\Noticias\Models\Estatus');
    }

}
