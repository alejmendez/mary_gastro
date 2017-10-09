<?php

namespace marygastro\Modules\Noticias\models;

use marygastro\Modules\Base\Models\Modelo;
use Carbon\Carbon;

class Audio extends Modelo
{
	protected $table = 'audio';
    protected $fillable = ['id', 'titulo', 'descripcion', 'url', 'published_at'];

    //protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function setPublishedAtAttribute($value){
		$this->attributes['published_at'] = Carbon::createFromFormat('d/m/Y H:i', $value);
	}

	public function getPublishedAtAttribute($value){
		return Carbon::parse($value)->format('d/m/Y H:i');
	}
}
