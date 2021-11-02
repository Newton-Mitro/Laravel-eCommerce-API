<?php

namespace App\Repositories\Order;

use App\Repositories\Base\BaseRepositoryInterface;

interface OrderRepositoryInterface extends BaseRepositoryInterface
{
    public function getOrdersByUserId(int $id);
    public function updateStatus(int $id, array $payload);
}
