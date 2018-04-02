<?php 

namespace marygastro\Modules\Pagina\Model;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    protected $connection = 'phppos';

    public $timestamps = false;
    protected $table = 'phppos_item_images';

    public function producto()
    {
        return $this->belongsTo('marygastro\Modules\Pagina\Model\Producto', 'item_id', 'image_id');
    }
}
