<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryInformation extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'mobile_number', 'email', 'address', 'city', 'post_code', 'country'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
