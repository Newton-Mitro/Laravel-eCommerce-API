<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'product_name' => 'string|between:2,255',
            'product_code' => 'string|max:100',
            'discription' => 'string',
            'stock' => 'integer',
            'price' => 'numeric',
            'discount' => 'numeric',
            'category_id' => 'integer',
            'subcategory_id' => 'integer',
            'brand_id' => 'integer',
            'product_unit_id' => 'integer',
        ];
    }
}
