<?php

$menu['pagos'] = [
	[
		'nombre' 	=> 'Pagos',
		'direccion' => '#Pagos',
		'icono' 	=> 'fa fa-gear',
		'menu' 		=> [
			[
				'nombre' 	=> 'Bancos',
				'direccion' => 'pagos/bancos',
				'icono' 	=> 'fa fa-user'
			],
			[
				'nombre' 	=> 'Planes',
				'direccion' => 'pagos/planes',
				'icono' 	=> 'fa fa-users'
			],
			[
				'nombre' 	=> 'Registro de pagos',
				'direccion' => 'pagos/pagos',
				'icono' 	=> 'fa fa-users'
			]
		]
	]
];

