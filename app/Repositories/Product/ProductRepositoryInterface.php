<?php

namespace App\Repositories\Product;

use App\Repositories\Base\BaseRepositoryInterface;

interface ProductRepositoryInterface extends BaseRepositoryInterface{
    public function searchByProductName(string $productName);
    public function productsByBrand(int $id);
}
