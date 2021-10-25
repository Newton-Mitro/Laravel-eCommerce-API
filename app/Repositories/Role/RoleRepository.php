<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\Role\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * RoleRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Role $model)
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
        $role = $this->model->find($id);
        return  $role->update($payload);
    }

    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function deleteById(int $id){
       $role = $this->model->find($id);
        return $role->delete();
    }
}
