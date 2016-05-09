<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class funcionario extends Model
{
    protected $primaryKey = 'id_funcionario';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'funcionarios';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'apellido', 'ci', 'rango', 'direccion', 'telefono'];

    public function scopeCi($query, $ci) 
    {
       if(trim($ci) != "")//trim elimina los espacios en blanco
       { 
        $query->where('ci', $ci);
       }
    }
}
