<?php 

namespace marygastro\Modules\Pagina\Model;

use Illuminate\Database\Eloquent\Model;

class VentaDetalle extends Model
{
	protected $connection = 'phppos';

	public $timestamps = false;
	protected $primaryKey = null;
    public $incrementing = false;

	protected $table = 'phppos_sales_items';
	protected $fillable = [
		'sale_id',
		'item_id',
		'rule_id',
		'rule_discount',
		'description',
		'serialnumber',
		'line',
		'quantity_purchased',
		'item_cost_price',
		'item_unit_price',
		'regular_item_unit_price_at_time_of_sale',
		'discount_percent',
		'commission',
		'is_bogo',
		'subtotal',
		'tax',
		'total',
		'profit',
	];

	public function producto()
    {
        return $this->hasOne('marygastro\Modules\Pagina\Model\Producto', 'item_id', 'item_id');
    }
}
