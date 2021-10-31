<?php

namespace App\Http\Resources\OrderItem;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product_code' => $this->product_code,
            'product_name' => $this->product_name,
            'brand' => $this->brand->name,
            'qty' => $this->qty,
            'product_unit' => $this->productUnit->unit_name,
            'unit_price' => $this->unit_price,
            'unit_total' => $this->unit_price * $this->qty,
        ];
    }
}
