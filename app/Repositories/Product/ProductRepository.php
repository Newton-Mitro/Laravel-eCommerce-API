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
    public function all(){
        return $this->model::where('active', 0)
        ->orderBy('product_name')
        ->with(['brand','subcategory','productUnit','productReviews','category'])
        ->get();
    }

    /**
     * Find model by id.
     *
     * @param int $modelId
     * @return Model
     */
    public function findById(int $id){
        return $this->model->where('id',$id)
        ->with(['brand','subcategory','productUnit','productReviews','category'])->first();
    }

    /**
     * Find product by its name
     *
     * @param string $productName
     * @return Collection
     */
    public function searchByProductName(string $productName){
        return $this->model->where('product_name','like','%' .$productName. '%')
        ->with(['brand','subcategory','productUnit','productReviews','category'])->get();
    }

    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload){
        return $this->model->create($payload);
    }

    /**
     * Update existing model.
     *
     * @param int $modelId
     * @param array $payload
     * @return bool
     */
    public function update(int $id, array $payload){
        $product = $this->model->find($id);
        return  $product->update($payload);
    }

    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function deleteById(int $id){
       $product = $this->model->find($id);
        return $product->delete();
    }
}
