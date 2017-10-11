<?php

namespace marygastro\Modules\Noticias\Models;

use Illuminate\Database\Eloquent\Model;

class noticias_categorias extends Model
{
    protected $table = 'noticia_categoria';
    protected $fillable = ['noticia_id', 'categoria_id'];

    protected $primaryKey = null;
    public $incrementing = false;

    protected $hidden = ['created_at', 'updated_at'];
}
