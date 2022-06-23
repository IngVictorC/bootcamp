<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarFormRequest extends FormRequest
{
    public function authorize()
    {
        /*esto lo cambiamos a true para poder que nos dé permiso para acceder al request
        El método authorize() retornará true si el usuario puede realizar la acción o false si no. 
        Para ello, utiliza el método Auth::check() que comprueba si un usuario está logueado o no.
         Si devuelve false, no validará la petición y podremos enviar un error al usuario avisando que es necesario
         estar logueado para realizarla.
        */
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //aqui ponemos que campos validar y las reglas de validacion

            //form peliculas
            'codigo' => 'required|numeric|',
            'anio' => 'required|numeric|regex:/^[0-9]+$/',
            'titulo' => 'required|max:255',
            'duracion' => 'required|numeric|regex:/^[0-9]+$/',
            'sinopsis' => 'required|max:255',
            'imagen' => 'nullable|file|image|max:8192',

            //form actor
            'nombre' => 'required|max:255',
            'fechanac' => 'required|date|before_or_equal:today',

        ];
    }

    public function messages()
    {
        return [
            //pelicula
            'codigo.required' => 'El :attribute es obligatorio',
            'codigo.numeric' => 'El :attribute debe ser un numero',

            'anio.required' => 'El :attribute es obligatorio',
            'anio.numeric' => 'El :attribute debe ser un numero',
            'anio.integer' => 'El :attribute debe ser un número entero',

            'titulo.required'  => 'El :attribute es obligatorio',
            'titulo.alpha' =>  'El :attribute debe ser enteramente alfabético',
            'titulo.max' => 'El :attribute debe contener menos de 255 caracteres',

            'duracion.required' => 'El :attribute es obligatorio',
            'duracion.numeric' => 'El :attribute debe ser un numero',
            'duracion.integer' => 'El :attribute debe ser un número entero',

            'sinopsis.required' => 'El :attribute es obligatorio',
            'sinopsis.alpha' => 'El :attribute debe ser enteramente alfabético',
            'sinopsis.max' => 'El :attribute debe contener menos de 255 caracteres',

            'imagen.file' => 'La :attribute debe ser un archivo cargado correctamente',
            'imagen.image' => 'La :attribute debe ser una imagen válida',
            'imagen.max' => 'La :attribute debe tener un tamaño menor a 8 MB',
             
            //actor
            'nombre.required' => 'El :attribute es obligatorio',
            'nombre.alpha' => 'El :attribute debe ser enteramente alfabético',
            'nombre.max' => 'El :attribute debe contener menos de 255 caracteres',

            'fechanac.required' => 'La :attribute es obligatoria',
            'fechanac.date' => 'La :attribute debe ser una fecha válida',
            'fechanac.before_or_equal' => 'La :attribute no puede ser posterior a la fecha actual',
           
        ];
    }

    public function attributes()
    {
        return [
            'codigo' => 'Codigo',
            'anio' => 'Año',
            'titulo' => 'Titulo',
            'duracion' => 'Duracion',
            'sinopsis' => 'Sinopsis',
            'imagen' => 'Imagen',

            'nombre' => 'Nombre',
            'fechanac' => 'Fecha de nacimiento'
        ];
    }
}
