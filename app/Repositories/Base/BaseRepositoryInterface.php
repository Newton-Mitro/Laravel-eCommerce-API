<?php

namespace App\Repositories\Base;

interface BaseRepositoryInterface
{
    public function all();
    public function findById(int $id);
    public function create(array $payload);
    public function update(int $id, array $payload);
    public function deleteById(int $id);
}
