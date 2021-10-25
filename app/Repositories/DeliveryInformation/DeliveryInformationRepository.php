<?php

namespace App\Repositories\DeliveryInformation;

use App\Models\DeliveryInformation;
use App\Repositories\DeliveryInformation\DeliveryInformationRepositoryInterface;

class DeliveryInformationRepository implements DeliveryInformationRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * DeliveryInformationRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(DeliveryInformation $model)
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
        $deliveryInformation = $this->model->find($id);
        return  $deliveryInformation->update($payload);
    }

    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function deleteById(int $id){
       $deliveryInformation = $this->model->find($id);
        return $deliveryInformation->delete();
    }
}
