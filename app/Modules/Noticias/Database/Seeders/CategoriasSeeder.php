<?php namespace App\Modules\Noticias\Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Modules\Noticias\Model\Categorias;

class CategoriasSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = [
			['Turismo', 'Turismo', '#ff0000'],
			['Sucesos', 'Sucesos', '#ff0000'],
			['Social', 'Social', '#ff0000'],
			['Sin Definir', ' sin definir', '#ff0000'],
			['Seguridad', 'Seguridad', '#ff0000'],
			['Salud', 'Salud', '#ff0000'],
			['Mineria', 'Mineria', '#ff0000'],
			['Infraestructura', 'Infraestructura', '#ff0000'],
			['Energia', 'Energia', '#ff0000'],
			['Educación', 'Educación', '#ff0000'],
			['Agua', 'Agua', '#ff0000'],
			['Agroindustria', 'Agroindustria', '#ff0000'],
		];

		foreach ($data as $d) {
			Categorias::create([
				'nombre' => htmlentities($d[0]),
				'slug' => str_slug($d[0]),
				'descripcion' => $d[1],
				'color' => $d[2]
			]);
		}
	}
}
