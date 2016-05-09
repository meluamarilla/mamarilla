<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoDenuncium extends Model
{
    protected $primaryKey = 'id_tipo_denuncia';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tipodenuncias';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [''];

    public function denuncia() {
        return $this->hasOne('App\denuncium', 'id_denuncia');
    }
    
    public function preguntas()
    {
        return $this->hasMany('App\pregunta', 'id_tipo_denuncia');
    }
    
   
}
