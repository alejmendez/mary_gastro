<?php

namespace marygastro\Modules\Pagos\Models;

use marygastro\Modules\base\Models\Modelo;
use Carbon\Carbon;
use marygastro\Modules\Pagos\Models\Planes;
use marygastro\Modules\Pagos\Models\Banco;

class Pagos extends modelo
{
    protected $table = 'pagos';
    protected $fillable = ["usuario_id","created_at","banco_emisor_id","banco_receptor_id","tipo_deposito","cod_referencia","planes_id","url","fecha","estatus","monto"];
    protected $campos = [

    'banco_emisor_id' => [
        'type' => 'select',
        'label' => 'Banco Emisor',
        'placeholder' => '- Seleccione un Banco Emisor',
    
    ],
    'banco_receptor_id' => [
        'type' => 'select',
        'label' => 'Banco Receptor',
        'placeholder' => '- Seleccione un Banco Receptor',
    
    ],
    'tipo_deposito' => [
        'type'       => 'select',
        'label'      => 'Tipo Deposito',
        //'cont_class' => 'form-group col-md-4',
        'options'    =>[
            '0' => 'Transferencia',
            '1' => 'Deposito'
        ] 
    ],
    'cod_referencia' => [
        'type' => 'number',
        'label' => 'Cod Referencia',
        'placeholder' => 'Cod Referencia del Pagos'
    ],
    'planes_id' => [
        'type' => 'select',
        'label' => 'Planes',
        'placeholder' => '- Seleccione un Planes',
       
    ],
    'fecha' => [
        'type' => 'text',
        'label' => 'Fecha',
        'placeholder' => 'Fecha del Pagos'
    ],
    'monto' => [
        'type' => 'number',
        'label' => 'Monto',
        'placeholder' => 'Monto del Pagos'
    ]
];
     protected $hidden = [
        'deleted_at'
    ];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->campos['planes_id']['options'] = Planes::pluck('nombre', 'id');
        $this->campos['banco_emisor_id']['options'] = Banco::pluck('nombre_banco', 'id');
        $this->campos['banco_receptor_id']['options'] = Banco::whereIn('id',[7,35])->pluck('nombre_banco', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo('marygastro\Modules\Base\Models\Usuario');
    }

    public function planes()
    {
        return $this->belongsTo('marygastro\Modules\Pagos\Models\Planes');
    }

     public function setFechaAttribute($value)
    {
        // 2016-06-27
        $formato = 'd/m/Y';
        if (preg_match('/^\d{4}-\d{1,2}-\d{1,2}$/', $value)){
            $formato = 'Y-m-d';
        }
        
        $this->attributes['fecha'] = Carbon::createFromFormat($formato, $value);
    }
    
    public function getFechaAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    }
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d/m/Y');
    }
    
}