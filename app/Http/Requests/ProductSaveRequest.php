<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductSaveRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'filled'],
            'brand' => ['required', 'filled'],
            'code' => ['required', 'filled'],
            'categoryId' => ['required', 'filled'],
            'price' => 'numeric|required|max:99999|min:1'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Název je třeba vyplnit',
            'title.filled' => 'Název je třeba vyplnit',
            'brand.filled' => 'Značku je třeba vyplnit',
            'price.max' => 'Maximalni cena je 99999',
            'category.required' => 'Kategorie musí být zvolena',
            'category.filled' => 'Kategorie musí být zvolena',
            'code.filled' => 'Kod musí být zvolen',
            'code.required' => 'Kod musí být zvolen',
        ];
    }

}
