<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * OrderRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    /**
     * Get all models.
     *
     * @return Collection
     */
    public function all(){
        return $this->model->with(['orderItems','orderStatus','createdByUser','updatedByUser'])->get();
    }

    /**
     * Find model by id.
     *
     * @param int $modelId
     * @return Model
     */
    public function findById(int $id){
        return $this->model->where('id',$id)->with(['orderItems','orderStatus','createdByUser','updatedByUser'])->first();
    }

    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload){
        $this->model = $this->model->create($payload);
        $orderId = $this->model->id;
        $orderItems = $payload['orderItems'];
        $deliveryInformation = $payload['deliveryInformation'];
        $this->model->deliveryInformation()->create($deliveryInformation);
        foreach($orderItems as $orderItem){
            $this->model->orderItems()->create($orderItem);
        }
        return  Order::where('id',$orderId)->with(['orderItems','deliveryInformation'])->first();
    }

    /**
     * Update existing model.
     *
     * @param int $modelId
     * @param array $payload
     * @return bool
     */
    public function update(int $id, array $payload){
        $order = $this->model->find($id);
        return  $order->update($payload);
    }

    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function deleteById(int $id){
       $order = $this->model->find($id);
        return $order->delete();
    }
}
