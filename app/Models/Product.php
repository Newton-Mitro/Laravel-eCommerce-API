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

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcatagory()
    {
        return $this->belongsTo(Subcategory::class);
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
