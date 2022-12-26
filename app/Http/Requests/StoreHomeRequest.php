<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreHomeRequest extends FormRequest
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
        return [
            'order'         => 'nullable',
            'content_2'     => 'required',
            'image'         => 'required',
        ];

        
    }

    public function messages()
    {
        return [
            'content_2.required'=> 'El título es obligatorio',
            'image.required'    => 'La imagen es obligatoria',
        ];
    }
}
