<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarroRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'modelo' => "required|min:3|max:100",
            "ano" => "required|min:4|max:4",
            'montadora' => "required|min:3|max:100",
            'cor' => "required|min:3|max:25",
            'placa' => "required|min:8|max:8"
        ];
    }
}
