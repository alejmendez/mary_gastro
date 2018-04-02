<?php

namespace  marygastro\Modules\Pagos\Database\Seeders;

use Illuminate\Database\Seeder;
use  marygastro\Modules\Pagos\Models\Banco;
use DB;

class bancosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            //['00'	,'Cacrete'],
            ['01'	,'Banco Central de Venezuela'],
            ['03'	,'Banco Industrial de Venezuela, C.A. Banco Universal'],
            ['0102'	,'Banco de Venezuela S.A.C.A. Banco Universal'],
            ['0104'	,'Venezolano de Crédito, S.A. Banco Universal'],
            ['0105'	,'Banco Mercantil, C.A S.A.C.A. Banco Universal'],
            ['0108'	,'Banco Provincial, S.A. Banco Universal'],
            ['0114'	,'Bancaribe C.A. Banco Universal'],
            ['0115'	,'Banco Exterior C.A. Banco Universal'],
            ['0128'	,'Banco Caroni C.A. Banco Universal'],
            ['0134'	,'Banesco Banco Universal S.A.C.A.'],
            ['0137'	,'Banco Sofitasa Banco Universal'],
            ['0138'	,'Banco Plaza Banco Universal'],
            ['0146'	,'Banco de la Gente Emprendedora C.A.'],
            ['0149'	,'Banco del Pueblo Soberano, C.A. Banco de Desarrollo'],
            ['0151'	,'BFC Banco Fondo Común C.A Banco Universal'],
            ['0156'	,'100% Banco, Banco Universal C.A.'],
            ['0157'	,'DelSur Banco Universal, C.A.'],
            ['0163'	,'Banco del Tesoro, C.A. Banco Universal'],
            ['0166'	,'Banco Agricola de Venezuela, C.A. Banco Universal'],
            ['0168'	,'Bancrecer, S.A. Banco Microfinanciero'],
            ['0169'	,'Mi Banco Banco Microfinanciero C.A.'],
            ['0171'	,'Banco Activo, C.A. Banco Universal'],
            ['0172'	,'Bancamiga Banco Microfinanciero C.A.'],
            ['0173'	,'Banco Internacional de Desarrollo, C.A. Banco Universal'],
            ['0174'	,'Ban%lus Banco Universal, C.A.'],
            ['0175'	,'Banco Bicentenario Banco Universal C.A.'],
            ['0176'	,'Banco Espirito Santo, S.A. Sucursal Venezuela B.U.'],
            ['0177'	,'Banco de la Fuerza Armada Nacional Bolivariana, B.U.'],
            ['0190'	,'Citibak N.A.'],
            ['0191'	,'Banco Nacional de Crédito, C.A. Banco Universal'],
            ['0601'	,'Instituto Municipal de Crédito Popular'],
            ['0116'	,'Banco Occidental de Descuento, Banco Universal C.A.'],
            ['1234'	,'corpbanca'],
        ];
        
        
        DB::beginTransaction();
        try {
            foreach ($datas as $data) {
                Banco::create([
                    'nombre_banco' => $data[1]
                ]);
            }
        } catch (Exception $e) {
            DB::rollback();
            echo "Error ";
        }
        DB::commit();
    }
}


/**/
