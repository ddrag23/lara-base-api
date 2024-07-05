<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class BaseFilter
{
    protected array $allowedFilter = [];
    function __construct(protected Builder $builder)
    {
    }


    function setAllowedFilter(array $allowed)
    {
        $this->allowedFilter = $allowed;
        return $this;
    }

    function getAllowedFilter()
    {
        return $this->allowedFilter;
    }

    function filter(Request $request)
    {
        $filters = $request->input('filters');
        $filterColumns = array_flip($this->getAllowedFilter());
        foreach ($filters as $column => $valueCol) {
            if (count($valueCol) > 1) {
                if (Arr::has($filterColumns, $column)) {
                    foreach ($valueCol as $keyValueCol => $valValueCol) {
                        $filterOperator = $keyValueCol;
                        $filterValue = $valValueCol;
                        if ($filterOperator == "lk" || $filterOperator == "nlk") {
                            $this->builder = $this->builder->where($column, $this->convertOperator($filterOperator), "%" . $filterValue . "%");
                        } else if ($filterOperator == "in") {
                            $filterValue = explode(",", $filterValue);
                            $this->builder = $this->builder->whereIn($column, $filterValue);
                        } else if ($filterOperator == "nin") {
                            $filterValue = explode(",", $filterValue);
                            $this->builder = $this->builder->whereNotIn($column, $filterValue);
                        } else if ($filterOperator == "neq") {
                            $filterValue = explode(",", $filterValue);
                            $this->builder = $this->builder->whereRaw("COALESCE(CAST(" . $column . " AS TEXT),'') != ?", [$filterValue]); //add coalesce to handle null value
                        } else {
                            $this->builder = $this->builder->where($column, $this->convertOperator($filterOperator), $filterValue);
                        }
                    }
                }
            } else {
                if (Arr::has($filterColumns, $column)) {
                    $filterOperator = key($filters[$column]);
                    $filterValue = $filters[$column][$filterOperator];
                    if ($filterOperator == "lk" || $filterOperator == "nlk") {
                        $this->builder = $this->builder->where($column, $this->convertOperator($filterOperator), "%" . $filterValue . "%");
                    } else if ($filterOperator == "in") {
                        $filterValue = explode(",", $filterValue);
                        $this->builder = $this->builder->whereIn($column, $filterValue);
                    } else if ($filterOperator == "nin") {
                        $filterValue = explode(",", $filterValue);
                        $this->builder = $this->builder->whereNotIn($column, $filterValue);
                    } else if ($filterOperator == "neq") {
                        $filterValue = explode(",", $filterValue);
                        $this->builder = $this->builder->whereRaw("COALESCE(CAST(" . $column . " AS TEXT),'') != ?", [$filterValue]); //add coalesce to handle null value
                    } else {
                        $this->builder = $this->builder->where($column, $this->convertOperator($filterOperator), $filterValue);
                    }
                }
            }
        }
    }
    private function convertOperator($operator)
    {
        $arrOperator = [
            "eq" => "=",
            "lt" => "<",
            "lte" => "<=",
            "gt" => ">",
            "gte" => ">=",
            "neq" => "!=",
            "lk" => "LIKE",
            "nlk" => "NOT LIKE",
            "in" => "in",
            "nin" => "not in"
        ];

        return (Arr::has($arrOperator, $operator) ? $arrOperator[$operator] : "");
    }
}
