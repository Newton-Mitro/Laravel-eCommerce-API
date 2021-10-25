<?php

namespace App\Repositories\ProductUnit;

use App\Models\ProductUnit;
use App\Repositories\ProductUnit\ProductUnitRepositoryInterface;

class ProductUnitRepository implements ProductUnitRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * ProductUnitRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(ProductUnit $model)
    {
        $this->model = $model;
    }

    /**
     * Get all models.
     *
     * @return Collection
     */
    public function all(){
        return $this->model->all();
    }

    /**
     * Find model by id.
     *
     * @param int $modelId
     * @return Model
     */
    public function findById(int $id){
        return $this->model->find($id);
    }

    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload){
        return $this->model->create($payload);
        // return $payload;
    }

    /**
     * Update existing model.
     *
     * @param int $modelId
     * @param array $payload
     * @return bool
     */
    public function update(int $id, array $payload){
        $productUnit = $this->model->find($id);
        return  $productUnit->update($payload);
    }

    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function deleteById(int $id){
       $productUnit = $this->model->find($id);
        return $productUnit->delete();
    }
}
