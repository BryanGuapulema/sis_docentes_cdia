<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Respuesta
 *
 * @property $id
 * @property $id_encuesta
 * @property $id_pregunta
 * @property $respuesta
 * @property $id_usuario
 * @property $fecha_respuesta
 * @property $created_at
 * @property $updated_at
 *
 * @property Encuesta $encuesta
 * @property Pregunta $pregunta
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Respuesta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_encuesta', 'id_pregunta', 'respuesta', 'id_usuario', 'fecha_respuesta'];


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
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_usuario', 'id');
    }
    
}
