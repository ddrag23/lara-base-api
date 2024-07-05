<?php

namespace App\Http\Repositories;

use App\Classes\BaseFilter;
use App\Classes\BaseSearch;
use App\Contracts\RepositoryContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository implements RepositoryContract
{
    protected Model $model;
    protected array $relation = [];
    protected array $detailRelation = [];
    protected array $countRelation = [];
    protected array $allowedFilter = ['email'];

    function all(Request $request): Collection | LengthAwarePaginator
    {
        $query = $this->model
            ->when(count($this->relation) > 0, fn ($query) => $query->with($this->relation))
            ->when(count($this->countRelation) > 0, function (Builder $builder) {
                foreach ($this->countRelation as $key => $value) {
                    $builder->withCount($value);
                }
            })
            ->when($request->has('filters'), fn (Builder $builder) => (new BaseFilter($builder))->setAllowedFilter($this->allowedFilter)->filter($request))
            ->when($request->has('search'), fn (Builder $builder) => (new BaseSearch($builder))->setAllowedField($this->allowedFilter)->search($request))
            ->latest();
        return $this->runData($query, $request);
    }
    function create(mixed $payload): Model|Collection
    {
        return $this->model->create($payload);
    }

    function update(int $id, mixed $payload): Model|Collection
    {
        $find = $this->model->find($id);
        if (is_null($find)) {
            throw new ModelNotFoundException('Data not found');
        }
        $find->update($payload);
        return $find;
    }
    function detail(int $id): Model|Collection
    {
        $find = $this->model->find($id);
        if (is_null($find)) {
            throw new ModelNotFoundException('Data not found');
        }
        return $find;
    }
    function delete(int $id): Model|Collection
    {
        $find = $this->model->find($id);
        if (is_null($find)) {
            throw new ModelNotFoundException('Data not found');
        }
        return $find->delete();
    }
    protected function runData(Builder $builder, Request $request): Collection | LengthAwarePaginator
    {
        return $request->has('type_data') && $request->type_data == 'all' ? $builder->get() : $builder->paginate($request->take ?? 5);
    }
}
