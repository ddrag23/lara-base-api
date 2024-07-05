<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface ServiceContract
{
    public function all(Request $request): mixed;
    public function detail(int $id): mixed;
    public function create(mixed $payload): mixed;
    public function update(int $id, mixed $payload): mixed;
    public function delete(int $id): mixed;
}
