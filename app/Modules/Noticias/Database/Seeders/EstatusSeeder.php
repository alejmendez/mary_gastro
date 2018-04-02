<?php namespace Modules\Noticias\Database\Seeds;

use Illuminate\Database\Seeder;
use Modules\Noticias\Model\Estatus;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Culminado',
            'Ejecución'
        ];

        foreach ($data as $d) {
            Estatus::create([
                'nombre' => $d
            ]);
        }
    }
}
