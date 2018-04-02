<?php 

namespace marygastro\Modules\Pagina\Model;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $connection = 'phppos';

    public $timestamps = false;
    protected $table = 'phppos_categories';

    public function productos()
    {
        return $this->hasMany('marygastro\Modules\Pagina\Model\Producto', 'category_id');
    }
}
