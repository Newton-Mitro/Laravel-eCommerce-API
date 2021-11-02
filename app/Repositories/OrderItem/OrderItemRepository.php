<?php

namespace App\Repositories\OrderItem;

use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\OrderItem\OrderItemRepositoryInterface;

class OrderItemRepository implements OrderItemRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * OrderItemRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(OrderItem $model)
    {
        $this->model = $model;
    }

    /**
     * Get all models.
     *
     * @return Collection
     */
    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * Find model by id.
     *
     * @param int $modelId
     * @return Model
     */
    public function findByOrderId(int $id)
    {
        return $this->model->where('order_id',$id)->get();
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
        $orderItem = $this->model->find($id);
        return $orderItem->update($payload);
    }

    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function deleteById(int $id)
    {
        $orderItem = $this->model->find($id);
        return $orderItem->delete();
    }
}
