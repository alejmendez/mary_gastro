<?php
$menu['escritorio'] = [	    
    [
        'nombre'    => 'Escritorio',
        'direccion' => 'incidencias/escritorios/tecnicos',
        'icono'     => 'fa fa-desktop'
    ]
];
$menu['inicio'] = [	
    [
        'nombre'    => 'Inicio',
        'direccion' => 'incidencias/inicio/usuarios',
        'icono'     => 'fa fa-home'
    ]
];
$menu['incidencias'] = [
	[
		'nombre' 	=> 'Consultas',
		'direccion' => '#Consultas',
		'icono' 	=> 'fa fa-gear',
		'menu' 		=> [
			[
				'nombre' 	=> 'Nueva Consulta',
				'direccion' => 'incidencias/incidencias',
				'icono' 	=> 'fa fa-plus'
			]
		]
	]
];
