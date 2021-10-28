<?php

namespace App\Http\Resources\Product;

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
            'id' => $this->id,
            'product_name' => $this->product_name,
            'product_code' => $this->product_code,
            'discription' => $this->discription,
            'stock' => $this->stock == 0 ? 'Out of stock' : $this->stock,
            'price' => $this->price,
            'discount' => $this->discount,
            'sale_price' => round((1 - ($this->discount / 100)) * $this->price, 2),
            'category' => $this->category->name,
            'subcategory' => $this->subcategory->name,
            'brand' => $this->brand->name,
            'product_unit' => $this->productUnit->unit_name,
            'rating' => $this->productReviews->count() > 0 ? round($this->productReviews->sum('star_rating') / $this->productReviews->count()) : 'No ratign yet',
            'reviews' => route('reviews.index', $this->id),
        ];
    }
}
