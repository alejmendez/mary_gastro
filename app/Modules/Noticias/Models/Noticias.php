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
    protected $fillable = [
        "titulo",
        "slug",
        "contenido",
        "categorias_id",
        "contenido_html",
        "resumen",
        "audio",
        "published_at"
    ];



    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

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
    public function setPublishedAtAttribute($value)
    {
        // 2016-06-27
       
        $formato = 'd/m/Y H:i';
        if (preg_match('/^\d{4}-\d{1,2}-\d{1,2}$/', $value)){
            $formato = 'Y-m-d H:i';
        }
        
        $this->attributes['published_at'] = Carbon::createFromFormat($formato, $value);
    }
    public function getPublishedAtAttribute($value){
       
        return Carbon::parse($value)->format('d/m/Y H:i');
    }

    // public function __construct(array $attributes = array())
    // {
    //     parent::__construct($attributes);
    //     $this->campos['categorias_id']['option'] = categorias::pluck('nombre', 'id');
    // }

    public function categorias()
    {
        return $this->belongsTo('marygastro\Modules\Noticias\Models\Categorias', 'categorias_id');
    }

    public function imagenes()
    {
        // belongsTo = "pertenece a" | hace relacion desde el detalle hasta el maestro
        return $this->hasMany('marygastro\Modules\Noticias\Models\Imagenes');
    }

    public function imagen()
    {
        // belongsTo = "pertenece a" | hace relacion desde el detalle hasta el maestro
        return $this->hasMany('marygastro\Modules\Noticias\Models\Imagenes')->first();
    }

    public function estatus()
    {
        // belongsTo = "pertenece a" | hace relacion desde el detalle hasta el maestro
        return $this->belongsTo('marygastro\Modules\Noticias\Models\Estatus');
    }

}
