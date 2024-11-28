<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Opcion;

/**
 * Class Pregunta
 *
 * @property $id
 * @property $enunciado
 * @property $tipo_pregunta
 * @property $escala
 * @property $created_at
 * @property $updated_at
 *
 * @property EncuestaPregunta[] $encuestaPreguntas
 * @property PreguntaOpcion[] $preguntaOpcion
 * @property Respuesta[] $respuestas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pregunta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['enunciado', 'tipo_pregunta', 'escala'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function encuestaPreguntas()
    {
        return $this->hasMany(\App\Models\EncuestaPregunta::class, 'id', 'id_pregunta');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preguntaOpcions()
    {
        return $this->hasMany(\App\Models\PreguntaOpcion::class, 'id', 'pregunta_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function respuestas()
    {
        return $this->hasMany(\App\Models\Respuesta::class, 'id', 'id_pregunta');
    }
    
    public function opciones()
    {
        return $this->belongsToMany(Opcion::class, 'pregunta_opcion');
    }
}
