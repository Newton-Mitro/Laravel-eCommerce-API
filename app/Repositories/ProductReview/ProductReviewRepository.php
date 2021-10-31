<?php

namespace App\Repositories\ProductReview;

use App\Models\ProductReview;
use App\Repositories\ProductReview\ProductReviewRepositoryInterface;

class ProductReviewRepository implements ProductReviewRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * ProductReviewRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(ProductReview $model)
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
        $productReview = $this->model->find($id);
        return $productReview->update($payload);
    }

    /**
     * Delete model by id.
     *
     * @param int $modelId
     * @return bool
     */
    public function deleteById(int $id)
    {
        $productReview = $this->model->find($id);
        return $productReview->delete();
    }
}
