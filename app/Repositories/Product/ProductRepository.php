<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * ProductRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * Get all models.
     *
     * @return Collection
     */
    public function all()
    {
        return $this->model::where('active', 1)
            ->paginate(20);
    }

    /**
     * Find model by id.
     *
     * @param int $modelId
     * @return Model
     */
    public function findById(int $id)
    {
        return $this->model->where('id', $id)
            ->with(['brand:id,name', 'subcategory:id,name', 'productUnit:id,unit_name', 'productReviews', 'category:id,name'])->first();
    }

    /**
     * Find product by its name
     *
     * @param string $productName
     * @return Collection
     */
    public function searchByProductName(string $productName)
    {
        return $this->model->where('active', 1)->where('product_name', 'like', '%' . $productName . '%')
            ->with(['brand:id,name', 'productUnit:id,unit_name'])->paginate(20);;
    }

    /**
     * Search products by Brand
     *
     * @param integer $id
     * @return Collection
     */
    public function productsByBrand(int $id)
    {
        return $this->model->where('brand_id', $id)->where('active', 1)
            ->with(['brand:id,name', 'productUnit:id,unit_name'])->paginate(20);;
    }

    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload)
    {
        return $this->model->create($payload);
    }

    /**
     * Update existing model.
     *
     * @param int $modelId
     * @param array $payload
     * @return bool
     */
    public function update(int $id, array $payload)
    {
        $product = $this->model->find($id);
        return $product->update($payload);
    }

    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function deleteById(int $id)
    {
        $product = $this->model->find($id);
        return $product->delete();
    }
}
