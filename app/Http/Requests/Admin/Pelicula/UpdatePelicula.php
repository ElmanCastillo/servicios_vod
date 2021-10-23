<?php

namespace App\Http\Requests\Admin\Pelicula;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePelicula extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.pelicula.edit', $this->pelicula);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nombre' => ['sometimes', 'string'],
            'descripcion' => ['sometimes', 'string'],
            'duracion' => ['sometimes', 'integer'],
            'url' => ['sometimes', 'string'],
            'thumb' => ['sometimes', 'string'],
            'genero_id' => ['sometimes', 'string'],
            'director_id' => ['sometimes', 'string'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
