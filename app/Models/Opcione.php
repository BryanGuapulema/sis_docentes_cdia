<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Opcione
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
class Opcione extends Model
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
    public function preguntaOpcions()
    {
        return $this->hasMany(\App\Models\PreguntaOpcion::class, 'id', 'opcion_id');
    }
    
}
