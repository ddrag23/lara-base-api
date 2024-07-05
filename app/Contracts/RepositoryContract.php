<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface RepositoryContract
{
    public function all(Request $request): Collection | LengthAwarePaginator;
    public function detail(int $id): Model | Collection;
    public function create(mixed $payload): Model | Collection;
    public function update(int $id, mixed $payload): Model | Collection;
    public function delete(int $id): Model | Collection;
}
