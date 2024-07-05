<?php

namespace App\Http\Services;

use App\Contracts\RepositoryContract;
use App\Contracts\ServiceContract;
use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\UserRepository;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

abstract class BaseService implements ServiceContract
{
    protected BaseRepository $repository;

    function all(Request $request): mixed
    {
        return $this->repository->all($request);
    }

    function detail(int $id): mixed
    {
        try {
            return $this->repository->detail($id);
        } catch (ModelNotFoundException $th) {
            throw new Exception("Data with ID {$id} not found", 404);
        }
    }

    function create(mixed $payload): mixed
    {
        return $this->repository->create($payload);
    }

    function update(int $id, mixed $payload): mixed
    {
        try {
            return $this->repository->update($id, $payload);
        } catch (ModelNotFoundException $th) {
            throw new Exception("Data with ID {$id} not found", 404);
        }
    }

    function delete(int $id): mixed
    {
        try {
            return $this->repository->delete($id);
        } catch (ModelNotFoundException $th) {
            throw new Exception("Data with ID {$id} not found", 404);
        }
    }
}
