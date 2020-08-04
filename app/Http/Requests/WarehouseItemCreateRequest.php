<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class WarehouseItemCreateRequest extends FormRequest
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
            'name' => 'required|min:5',
            'EAN' => 'required|numeric|',
            'type' => 'required|numeric',
            'weight' => 'required|numeric',
            'color' => 'required|string',
            'active' => 'required|boolean',
            'quantity' => 'required|min:0|max:100',
            'price' => 'required|min:0|max:100'
        ];
    }
}
