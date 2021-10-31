<?php

namespace App\Http\Resources\DeliveryInfo;

use Illuminate\Http\Resources\Json\JsonResource;

class DeliveryInformationResource extends JsonResource
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
            'customer_name' => $this->customer_name,
            'mobile_number' => $this->mobile_number,
            'customer_email' => $this->email,
            'address' => $this->address,
            'city' => $this->city,
            'post_code' => $this->post_code,
            'country' => $this->country,
        ];
    }
}
