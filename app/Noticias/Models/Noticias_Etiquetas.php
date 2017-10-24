<?php

namespace marygastro\Modules\Noticias\Models;

use Illuminate\Database\Eloquent\Model;

class Noticias_Etiquetas extends Model
{
    protected $table = 'noticia_etiqueta';
    protected $fillable = ['noticias_id', 'etiquetas_id'];

    protected $primaryKey = null;
    public $incrementing = false;

    protected $hidden = ['created_at', 'updated_at'];
}
