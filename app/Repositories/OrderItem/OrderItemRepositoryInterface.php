<?php

namespace App\Repositories\OrderItem;


interface OrderItemRepositoryInterface
{
    public function findByOrderId(int $id);
    public function findById(int $id);
    public function create(array $payload);
    public function update(int $id, array $payload);
    public function deleteById(int $id);
}
