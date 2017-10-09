<?php 

namespace marygastro\Modules\Pagina\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	protected $connection = 'phppos';

	public $timestamps = false;
	protected $primaryKey = null;
    public $incrementing = false;

	protected $table = 'phppos_location_items';

	public function productos()
    {
        return $this->hasOne('marygastro\Modules\Pagina\Model\Producto', 'item_id', 'item_id');
    }
}
