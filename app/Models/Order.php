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
    protected $fillable = ['total_price', 'created_by', 'updated_by', 'order_status_id'];
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

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
