<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\DeliveryInfo\DeliveryInformationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'date_of_order' => $this->created_at->format('Y.M.d H:i:s'),
            'ordered_by' => $this->createdByUser->name,
            'order_total' => $this->total_price,
            'order_status' => $this->orderStatus->status_name,
            'delivery_information' => new DeliveryInformationResource($this->deliveryInformation),
            'order_items' => route('items.by_order', $this->id),
        ];
    }
}
