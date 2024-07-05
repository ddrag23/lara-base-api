<?php

namespace App\Http\Services;

use App\Contracts\ServiceContract;
use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\UserRepository;

class UserService extends BaseService
{
    protected BaseRepository $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}
