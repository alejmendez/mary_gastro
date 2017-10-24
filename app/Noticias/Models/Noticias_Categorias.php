<?php

namespace marygastro\Modules\Noticias\Models;

use Illuminate\Database\Eloquent\Model;

class Noticias_Categorias extends Model
{
    protected $table = 'noticia_categoria';
    protected $fillable = ['noticias_id', 'categorias_id'];

    protected $primaryKey = null;
    public $incrementing = false;

    protected $hidden = ['created_at', 'updated_at'];


}
