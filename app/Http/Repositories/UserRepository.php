<?php

namespace App\Http\Repositories;

use App\Contracts\RepositoryContract;
use App\Models\User;

class UserRepository extends BaseRepository
{
    protected array $relation = [];
    protected array $detailRelation = [];
    protected array $countRelation = [];
    function __construct()
    {
        $this->model = new User();
    }
}
