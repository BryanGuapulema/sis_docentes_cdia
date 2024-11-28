<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pregunta
 *
 * @property $id
 * @property $enunciado
 * @property $tipo
 * @property $created_at
 * @property $updated_at
 *
 * @property EncuestaPregunta[] $encuestaPreguntas
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
    protected $fillable = ['enunciado', 'tipo'];


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
    public function respuestas()
    {
        return $this->hasMany(\App\Models\Respuesta::class, 'id', 'id_pregunta');
    }
    
}
