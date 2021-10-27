<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'total_price' => 'required|numeric',
            'created_by' => 'required|integer',
            'updated_by' => 'required|integer',
            'order_status_id' => 'required|integer',
            'delivery_information' => 'required',
            'order_items' => 'required'
        ];
    }
}
