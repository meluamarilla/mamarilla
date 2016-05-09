<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cuentum extends Model
{
    protected $primaryKey = 'id_cuenta';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cuentas';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [''];
    
    //función para el buscador, recibe como parámetro el número de ci 
    public function scopeCi($query, $ci) 
    {
       if(trim($ci) != "")//trim elimina los espacios en blanco
       { 
        $query->where('ci', $ci);
       }
    }
    
    public function denuncia() {
        return $this->hasMany('App\denuncium', 'id_denuncia');
    }

}
