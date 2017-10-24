<?php

namespace marygastro\Modules\Noticias\Models;

use marygastro\Modules\Base\Models\Modelo;
use Carbon\Carbon;

use marygastro\Modules\Base\Models\Usuario;

use marygastro\Modules\Noticias\Models\Imagenes;
use marygastro\Modules\Noticias\Models\Categorias;
use marygastro\Modules\Noticias\Models\Etiquetas;

class Noticias extends Modelo
{
    protected $settings = array(
		'exclude'       => array(
			'id',
			'created_at',
			'updated_at',
			'deleted_at',
			'password'
		),
		'extras'    => array(
			'class' => '',
			'cont_class' => 'col-lg-3 col-md-4 col-sm-6 col-xs-12'
		),
		'showLabels'    => true
	);
    protected $table = 'noticias';
    protected $fillable = ["titulo","slug","contenido","contenido_html","resumen","audio","published_at"];
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
        'categoria_id' => [
            'type'          => 'select',
            'label'         => 'Categoria',
            'placeholder'   => 'Categoria',
            'url'           => 'backend/Noticias/definiciones/categorias',
            'name'          => 'categoria_id[]',
            'class'         => 'bs-select',
            'multiple'      => 'multiple',
        ],
        'etiquetas_id' => [
            'type'          => 'select',
            'label'         => 'Etiquetas',
            'placeholder'   => 'Etiquetas',
            'url'           => 'backend/Noticias/definiciones/etiquetas',
            'name'          => 'etiquetas_id[]',
            'class'         => 'bs-select',
            'multiple'      => 'multiple',
        ]
    ];

    public function setPublishedAtAttribute($value){
        $this->attributes['published_at'] = Carbon::createFromFormat('d/m/Y H:i', $value);
    }
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->campos['categoria_id']['options'] = Categorias::pluck('nombre', 'id');
        $this->campos['etiquetas_id']['options'] = Etiquetas::pluck('nombre', 'id');
    }

    protected $dates = ['published_at'];

    public function categorias()
    {
        return $this->belongsToMany('marygastro\Modules\Noticias\Models\Categorias', 'categorias_id');
    }

    public function etiquetas()
    {
        return $this->belongsToMany('marygastro\Modules\Noticias\Models\Etiquetas', 'etiquetas_id');
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
