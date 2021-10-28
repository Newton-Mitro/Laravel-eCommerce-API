<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'review' => $this->review,
            'star_rating' => $this->star_rating,
            'created_at' => $this->created_at->format('Y.M.d H:i:s'),
            'updated_at' => $this->updated_at->format('Y.M.d H:i:s'),
            'created_by' => $this->user->name,
            'product_id' => $this->product_id,
        ];
    }
}
