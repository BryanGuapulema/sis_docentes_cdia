<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EncuestaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'id_asignatura' => 'required',
			'nombre_encuesta' => 'required|string',
			'fecha_creacion' => 'required',
			'creado_por' => 'required',
			'enlace_encuesta' => 'required|string',
        ];
    }
}
