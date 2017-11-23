<?php

namespace marygastro\Modules\Base\Http\Requests;

use marygastro\Http\Requests\Request;

class ComprasRequest extends Request {
    protected $reglasArr = [
		'sale_id'              => ['required', 'integer'], 
		//'codigo'             => ['required', 'min:3', 'max:80', 'unique:compras,codigo'], 
		//'usuario_id'         => ['required', 'integer'], 
		'bancos_id'            => ['required', 'integer'], 
		'nombre'               => ['required', 'min:3', 'max:250'], 
		'cedula'               => ['required', 'min:3', 'max:15'], 
		'telefono'             => ['required', 'min:3', 'max:250'], 
		'correo'               => ['required', 'min:3', 'max:80'], 
		'direccion'            => ['required', 'min:3', 'max:250'], 
		//'nota'               => ['required', 'min:3', 'max:250'], 
		'codigo_transferencia' => ['required', 'min:3', 'max:50'], 
		'banco_usuario'        => ['required', 'min:3', 'max:50'], 
		'comprobante'          => ['required', 'min:3', 'max:100'], 
		'monto'                => ['required']
	];
}