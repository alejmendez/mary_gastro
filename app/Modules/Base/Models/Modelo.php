<?php

namespace marygastro\Modules\Base\Models;

use DB;
use Html;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use marygastro\Modules\Base\Models\Historico;

use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

abstract class Modelo extends Model implements AuditableContract
{
    use SoftDeletes;
    use Auditable;
    protected $fillable = [];

    protected $hidden = ['created_at', 'updated_at'];
    protected $historico = true;
    public static $_historico = true;
    //protected $dateFormat = 'd/m/Y H:i:s';
    
    public $timestamps = false;

    public $bootstrap = true;
    public $usuario_permisos = false;

    protected $settings = array(
        'exclude'       => array(
            'id',
            'created_at',
            'updated_at',
            'deleted_at',
            'password'
        ),
        'extras'    => array(
            'class' => 'form-control',
            'cont_class' => 'col-lg-3 col-md-4 col-sm-6 col-xs-12'
        ),
        'showLabels'    => true
    );

    protected $campos = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        });

        //--- Modificando los campos de fecha y hora
        // Creando
        static::creating(function ($model) {
            $model->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $model->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        });

        // Actualizando
        static::updating(function ($model) {
            $model->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        });
    }

    public function formatoFecha($value)
    {
        if ($value == '') {
            return null;
        }

        $formato = preg_match('/^\d{4}-\d{1,2}-\d{1,2}$/', $value) ? 'Y-m-d' : 'd/m/Y';
        return Carbon::createFromFormat($formato, $value);
    }

    public function generate($elements = [], $options = [])
    {
        $table = $this->getTable();
        
        $this->setSettings($options);
        $data = [];
        
        $wildcards = $this->getSettings('extras');

        if (empty($elements)) {
            $elements = array_keys($this->campos);
        }
        
        //foreach ($this->campos as $fieldName => $prop) {
        foreach ($elements as $fieldName) {
            if (!isset($this->campos[$fieldName])) {
                continue;
            }
            
            $prop = $this->campos[$fieldName];
            if ($fieldName == '*' || in_array($fieldName, $this->getSettings('exclude'))) {
                continue;
            }

            $html = [];
            $value = isset($this->campos[$fieldName]['value']) ? $this->campos[$fieldName]['value'] : null;

            if (empty($value)) {
                $value = $this->{$fieldName};
                if (empty($value)) {
                    $value = null;
                }
            }

            if (!isset($prop['id'])) {
                $prop['id'] = $fieldName;
            }

            if (isset($prop['type'])) {
                $tipo = $prop['type'];
            }

            if (!isset($prop['class'])) {
                $prop['class'] = $wildcards['class'];
            } elseif (isset($wildcards['class'])) {
                $prop['class'] .= ' ' . $wildcards['class'];
            }

            $required = false;
            if (isset($prop['required']) && $prop['required']) {
                $required = true;
                $prop['required'] = 'required';
            }

            unset($prop['type'], $prop['value'], $prop['options'], $prop['label'], $prop['content_before'], $prop['content_after']);

            if (empty($tipo)) {
                $dataType = 'string';
                $tipo = $this->getInputType($dataType);
            }

            if ($this->getContentBefore($fieldName)) {
                $html[] = $this->getContentBefore($fieldName);
            }

            $label = '';

            if ($this->getSettings('showLabels')) {
                $label = \Form::label($prop['id'], $this->getLabelText($fieldName) . ':', $required ? ['class' => 'required'] : []);
            }

            $cont_class = isset($prop['cont_class']) ? $prop['cont_class'] : '';

            /*
            hidden
            checkbox
            radio
            date
            time
            textarea
            number
            select
            */
            switch ($tipo) {
                case 'hidden':
                    $label = '';
                    $html[] = \Form::input($tipo, $fieldName, $value, $prop);
                    $data[] = trim(implode(PHP_EOL, $html));
                    continue(2);

                    break;
                case 'checkbox':
                    $label = '';
                    if ($this->getSettings('showLabels')) {
                        $html[] = "<label class='checkbox'>";
                    }
                    $html[] = \Form::checkbox($fieldName, null, null, $prop) . $this->getLabelText($fieldName);
                    if ($this->getSettings('showLabels')) {
                        $html[] = "</label>";
                    }
                    break;
                case 'radio':
                    $label = '';
                    if ($this->getSettings('showLabels')) {
                        $html[] = "<label class='radio'>";
                    }
                    $html[] = \Form::radio($fieldName, null, null, $prop) . $this->getLabelText($fieldName);
                    if ($this->getSettings('showLabels')) {
                        $html[] = "</label>";
                    }
                    break;
                case 'number':
                    $html[] = \Form::number($fieldName, $value, $prop);
                    break;
                case 'date':
                    $html[] = \Form::input('date', $fieldName, date('Y-m-d', strtotime($value)), $prop);
                    break;
                case 'time':
                    $html[] = \Form::input('time', $fieldName, date('H:i:s', strtotime($value)), $prop);
                    break;
                case 'textarea':
                    $prop['rows'] = 6;
                    $html[] = \Form::textarea($fieldName, $value, $prop);
                    break;
                case 'select':
                    if (!isset($prop['placeholder'])) {
                        $prop['placeholder'] = '- Seleccione';
                    } elseif ($prop['placeholder'] === false) {
                        unset($prop['placeholder']);
                    }

                    if (isset($prop['url'])) {
                        if ($this->getSettings('showLabels')) {
                            $labelText = $this->getLabelText($fieldName) . ':';
                            

                            if ($this->permisologia($prop['url'] . '/nuevo')) {
                                $labelText .= ' <i class="fa fa-plus" data-ele="' . $fieldName . '" data-url="' . url($prop['url'] . '/nuevo') . '" title="Crear un ' . $this->getLabelText($fieldName) . '"></i>';
                            }
                            
                            if ($this->permisologia($prop['url'] . '/cambiar')) {
                                $labelText .= ' <i class="fa fa-pencil disabled" data-ele="' . $fieldName . '" data-url="' . url($prop['url'] . '/cambiar') . '" title="Modificar ' . $this->getLabelText($fieldName) . '"></i>';
                            }
                            unset($prop['url']);
                            $label = '<label for="' . $fieldName . '" ' . ($required ? 'class="required"' : '') . '>' . $labelText . '</label>';
                        }
                    }

                    $options = isset($this->campos[$fieldName]['options']) ? $this->campos[$fieldName]['options'] : [];

                    $html[] = \Form::select($fieldName, $options, $value, $prop);
                    break;
                case 'div':
                    unset($prop['cont_class'], $prop['placeholder']);
                    $html[] = Html::tag('div', '', $prop);
                    break;
                default:
                    unset($prop['cont_class']);
                    $html[] = \Form::input($tipo, $fieldName, $value, $prop);
                    break;
            }

            if ($this->getContentAfter($fieldName)) {
                $html[] = $this->getContentAfter($fieldName);
            }

            $html = $label . trim(implode(PHP_EOL, $html));
            
            if ($cont_class != '') {
                $html = '<div class="form-group ' . $cont_class . '">' . $html . '</div>';
            } elseif (isset($wildcards['cont_class'])) {
                $html = '<div class="form-group ' . $wildcards['cont_class'] . '">' . $html . '</div>';
            }

            $data[] = $html;
        }

        return trim(implode(PHP_EOL, $data));
    }

    protected function getLabelText($fieldName)
    {
        if (isset($this->campos[$fieldName]['label']) && !empty($this->campos[$fieldName]['label'])) {
            return $this->campos[$fieldName]['label'];
        }

        return ucwords(str_replace("_", " ", $fieldName));
    }

    protected function getContentBefore($fieldName)
    {
        $content = isset($this->campos[$fieldName]['content_before']) ? $this->campos[$fieldName]['content_before'] : null;
        $wildcardContent = $this->getSettings('extras', 'content_before');
        if (isset($wildcardContent) and !empty($wildcardContent)) {
            $content = (isset($content) and !empty($content)) ? array_push($content, $wildcardContent) : $wildcardContent;
        }
        
        if (isset($content) and !empty($content)) {
            return $content;
        }
    }

    protected function getContentAfter($fieldName)
    {
        $content = isset($this->campos[$fieldName]['content_after']) ? $this->campos[$fieldName]['content_after'] : null;
        $wildcardContent = $this->getSettings('extras', 'content_after');
        if (isset($wildcardContent) and !empty($wildcardContent)) {
            $content = (isset($content) and !empty($content)) ? array_push($wildcardContent, $content) : $wildcardContent;
        }
        if (isset($content) and !empty($content)) {
            return $content;
        }
    }

    protected function getInputType($dataType)
    {
        $lookup = array(
            'string'  => 'text',
            'float'   => 'text',
            'date'    => 'text',
            'text'    => 'textarea',
            'boolean' => 'checkbox'
        );
        return array_key_exists($dataType, $lookup)
            ? $lookup[$dataType]
            : 'text';
    }

    protected function setSettings($options)
    {
        $this->settings = array_merge($this->settings, $options);
    }

    protected function getSettings()
    {
        $stngs = $this->settings;
        foreach (func_get_args() as $arg) {
            if (! is_array($stngs) or ! is_scalar($arg) or ! isset($stngs[$arg])) {
                return [];
            }
            $stngs = $stngs[$arg];
        }
        return $stngs;
    }

    public function permisologia($ruta = '')
    {
        $usuario = auth()->user();
        if (strtolower($usuario->super) === 's') {
            return true;
        }

        if ($this->usuario_permisos === false) {
            $this->usuario_permisos = $usuario->permisos();
        }
        
        if ($ruta === '') {
            $ruta = $this->ruta();
        }

        $ruta = preg_replace('/^' . \Config::get('admin.prefix') . '\//i', '', $ruta);

        return $this->usuario_permisos->search($ruta);
    }
}
