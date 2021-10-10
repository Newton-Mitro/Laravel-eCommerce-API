<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\DeliveryInformation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function deliveryInformation()
    {
        return $this->hasOne(DeliveryInformation::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
