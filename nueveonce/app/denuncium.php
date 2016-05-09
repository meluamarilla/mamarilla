<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class denuncium extends Model
{
    protected $primaryKey = 'id_denuncia';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'denuncias';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [''];

    public function tipo()
    {
        return $this->hasOne('App\tipoDenuncium', 'id_tipo_denuncia');
    }
    
    public function cuenta()
    {
        return $this->belongsTo('App\cuentum', 'id_cuentas');
    }        
}
