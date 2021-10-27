<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'product_name' => 'required|string|between:2,255',
            'product_code' => 'required|string|max:100|unique:products',
            'discription' => 'text',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'discount' => 'numeric',
            'category_id' => 'required|integer',
            'subcategory_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'product_unit_id' => 'required|integer',
        ];
    }
}
