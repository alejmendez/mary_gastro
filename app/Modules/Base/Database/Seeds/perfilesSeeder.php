<?php namespace marygastro\Modules\Base\Database\Seeds;

use Illuminate\Database\Seeder;
use marygastro\Modules\Base\Model\Perfil;

class perfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perfiles = [
            'Desarrollador',
            'Administrador',
            'Tecnico',
            'Supervisor',
            'Asistente',
            'Secretaria',
            'Cliente'
        ];

        foreach ($perfiles as $perfil) {
            Perfil::create([
                'nombre' => $perfil
            ]);
        }
    }
}
