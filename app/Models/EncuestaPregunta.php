<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EncuestaPregunta
 *
 * @property $id
 * @property $id_encuesta
 * @property $id_pregunta
 * @property $created_at
 * @property $updated_at
 *
 * @property Encuesta $encuesta
 * @property Pregunta $pregunta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EncuestaPregunta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_encuesta', 'id_pregunta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function encuesta()
    {
        return $this->belongsTo(\App\Models\Encuesta::class, 'id_encuesta', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pregunta()
    {
        return $this->belongsTo(\App\Models\Pregunta::class, 'id_pregunta', 'id');
    }
    
}
