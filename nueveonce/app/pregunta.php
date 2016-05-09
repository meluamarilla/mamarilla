<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pregunta extends Model
{
    protected $primaryKey = 'id_preguntas';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'preguntas';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [''];
  
    public function tipo()
    {
        return $this->belongsTo('App\tipoDenuncium', 'id_tipo');
    }
}
