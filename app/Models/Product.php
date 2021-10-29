<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductUnit;
use App\Models\Subcategory;
use App\Models\ProductReview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // protected $fillable = ['product_name', 'product_code', 'discription', 'stock', 'price', 'discount', 'active', 'category_id', 'subcategory_id', 'brand_id', 'product_unit_id'];
    protected $guarded = [];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productUnit()
    {
        return $this->belongsTo(ProductUnit::class);
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class);
    }
}
