<?php namespace marygastro\Modules\Base\Database\Seeds;

use Illuminate\Database\Seeder;
use marygastro\Modules\Base\Model\Usuario;

class usuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = Usuario::create([
            'usuario' => 'admin',
            'password' => 'admin',
            'perfil_id' => 1,
            'persona_id' => 1,
            'super' => 's',
            'confirmado'=> 's'
        ]);
    }
}
