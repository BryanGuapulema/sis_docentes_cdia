<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Opcion
 *
 * @property $id
 * @property $opcion
 * @property $valor
 * @property $created_at
 * @property $updated_at
 *
 * @property PreguntaOpcion[] $preguntaOpcions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Opcion extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['opcion', 'valor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preguntaOpciones()
    {
        return $this->hasMany(\App\Models\PreguntaOpcion::class, 'id', 'opcion_id');
    }

    public function preguntas()
    {
        return $this->belongsToMany(Pregunta::class, 'pregunta_opcion');
    }
    
}
