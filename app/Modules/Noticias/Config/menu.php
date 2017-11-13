<?php
$menu['noticias'] = [
    [
		'nombre'	=>	'Noticias',
		'direccion'	=>	'#Noticias',
		'icono'		=>	'fa fa-folder',
        'menu'      =>  [

            [
                'nombre'    => 'Noticas',
                'direccion' =>  'Noticias',
                'icono'     =>  'fa fa-quote-right'
            ],
            /* [
                'nombre'    =>  'Publicar',
                'direccion' =>  'publicar',
                'icono'     =>  'fa fa-share-alt'
            ], */
            [
                'nombre'    =>  'Categorias',
                'direccion' =>  'Noticias/definiciones/categorias',
                'icono'     =>  'fa fa-pencil-square-o'
            ],
            [
                'nombre'    =>  'Tips',
                'direccion' =>  'Noticias/tips',
                'icono'     =>  'fa fa-pencil-square-o'
            ]
        ]
	]
];
 ?>
