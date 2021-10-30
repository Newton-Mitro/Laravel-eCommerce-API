<?php

namespace App\Repositories\Order;

use App\Events\OrderReceivedEvent;
use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderReceivedNotification;
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
     * Get user orders
     *
     * @param integer $id
     * @return Collection
     */
    public function getOrdersByUserId(int $id)
    {
        return $this->model->where('created_by', $id)->get();
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
        // dd($payload['delivery_information']);
        $this->model = $this->model->create($payload);
        $this->model->deliveryInformation()->create($payload['delivery_information']);
        foreach ($payload['order_items'] as $orderItem) {
            $this->model->orderItems()->create($orderItem);
        }

        User::find(1)->notify(new OrderReceivedNotification);
        // event(OrderReceivedEvent::class);
        return  $this->model->where('id', $this->model->id)->with(['orderItems', 'deliveryInformation'])->first();
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
        $order = $this->model->find($id);
        if ($order->order_status_id < 2 || auth()->user()->role_id == 1) {
            $order->deliveryInformation()->update($payload['delivery_information']);
            $order->orderItems()->delete();
            foreach ($payload['order_items'] as $orderItem) {
                $order->orderItems()->create($orderItem);
            }
            return true;
        } else {
            return false;
        }
    }


    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function deleteById(int $id)
    {
        $order = $this->model->find($id);
        return $order->delete();
    }
}
