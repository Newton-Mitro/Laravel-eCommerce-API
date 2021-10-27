<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'product_name' => $this->product_name,
            'product_code' => $this->product_code,
            'discription' => $this->discription,
            'stock' => $this->stock,
            'price' => $this->price,
            'discount' => $this->discount,
            'category_id' => $this->category_id,
            'subcategory_id' => $this->subcategory_id,
            'brand_id' => $this->brand_id,
            'product_unit_id' => $this->product_unit_id,
            'rating' => $this->productReviews->sum('star_rating')/$this->productReviews->count(),
            'reviews' => route('product-reviews.show',$this->id),
        ];
    }
}
