<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * UserRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(User $model)
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
        $user = $this->model->find($id);
        return  $user->update($payload);
    }

    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function deleteById(int $id){
       $user = $this->model->find($id);
        return $user->delete();
    }
}
