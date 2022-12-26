<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $args = [
            'id'        => 'required',
            'image'     => 'nullable|mimes:jpeg,jpg,png,svg',
            'content_1' => 'required|string',
            'content_2' => 'required|string',
        ];

        return $args;
        
    }

    public function messages()
    {
        return [
            'id.required'       => 'ID del elemento es requerido',
            'content_1.required'=> 'El título es requerido',
            'content_2.required'=> 'El contenido es requerido',
            'image.mimes'       => 'Solo se aceptan archivos con extension jpeg, jpg, png, svg',
            'order'             => 'Orden es requerido'
        ];
    }
}
