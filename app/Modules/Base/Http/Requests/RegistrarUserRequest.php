<?php

namespace marygastro\Modules\Base\Http\Requests;

use marygastro\Http\Requests\Request;

class RegistrarUserRequest extends Request
{
    protected $reglasArr = [
        'password'       => ['required', 'password', 'min:4', 'max:50'],
        'dni'            => ['required', 'integer', 'unique:personas,dni'],
        'nombres'        => ['required', 'nombre', 'min:3', 'max:50'],
        'correo'         => ['required','max:50', 'unique:personas_correo,correo'],
    ];
    
    public function authorize()
    {
        return true;
    }
    /* public function rules() {
        $rules = parent::rules();

        switch ($this->method()){
            case 'POST':

                if ($this->input('password') == '') {
                    unset($rules['password']);
                }
                if ($this->input('nombres') == '') {
                    unset($rules['nombres']);
                }

                break;
        }

        return $rules;
    } */
}
