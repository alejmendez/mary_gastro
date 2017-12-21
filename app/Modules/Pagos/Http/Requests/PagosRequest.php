<?php

namespace marygastro\Modules\Pagos\Http\Requests;

use marygastro\Http\Requests\Request;

class PagosRequest extends Request {
    protected $reglasArr = [
		/* 'usuario_id' => ['required', 'integer'],  */
		'banco_emisor_id' => ['required', 'integer'], 
		'banco_receptor_id' => ['required', 'integer'], 
		'tipo_deposito' => ['required', 'integer'], 
		'cod_referencia' => ['required'], 
		'planes_id' => ['required', 'integer'], 
		/* 'url' => ['required', 'min:3', 'max:200'],  */
		'fecha' => ['required', 'date_format:"d/m/Y"'], 
		/* 'estatus' => ['required', 'integer'], */ 
		'monto' => ['required']
	];
}