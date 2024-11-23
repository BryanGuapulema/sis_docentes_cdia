<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'uuid',
        'created_by',
        'questions',        
    ];

    /**
     * Relación: Encuesta tiene muchas respuestas.
     */
    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
