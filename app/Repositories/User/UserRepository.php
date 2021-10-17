<?php

namespace App\Repositories\Base;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;

class UserRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
