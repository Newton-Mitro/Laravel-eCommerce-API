<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * CategoryRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Category $model)
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
        $category = $this->model->find($id);
        return  $category->update($payload);
    }

    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function deleteById(int $id){
       $category = $this->model->find($id);
        return $category->delete();
    }
}
