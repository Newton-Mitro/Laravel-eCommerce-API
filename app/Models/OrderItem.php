<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    // protected $fillable = ['product_code', 'product_name', 'brand', 'qty', 'unit_price', 'product_unit'];
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
