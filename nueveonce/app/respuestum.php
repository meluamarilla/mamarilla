<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class respuestum extends Model
{
    protected $primaryKey = 'id_respuesta';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'respuestas';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [''];
    
    public function preguntas() {
        return $this->belongsTo('App\pregunta', 'id_preguntas');
    }

}
