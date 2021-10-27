<?php

namespace App\Repositories\OrderStatus;

use App\Models\OrderStatus;
use App\Repositories\OrderStatus\OrderStatusRepositoryInterface;

class OrderStatusRepository implements OrderStatusRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * OrderStatusRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(OrderStatus $model)
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
        return $this->model->all();
    }

    /**
     * Find model by id.
     *
     * @param int $modelId
     * @return Model
     */
    public function findById(int $id)
    {
        return $this->model->find($id);
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
        // return $payload;
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
        $orderStatus = $this->model->find($id);
        return  $orderStatus->update($payload);
    }

    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function deleteById(int $id)
    {
        $orderStatus = $this->model->find($id);
        return $orderStatus->delete();
    }
}
