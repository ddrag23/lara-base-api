<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BaseSearch
{
    private array $allowedField;
    function __construct(protected Builder $builder)
    {
    }
    function setAllowedField(array $field)
    {
        $this->allowedField = $field;
        return $this;
    }
    function getAllowedField()
    {
        return $this->allowedField;
    }
    function search(Request $request)
    {
        $allowedSearchField = $this->getAllowedField();
        $countAllowedSearchField = count($allowedSearchField);
        $keySearch = strtolower($request->input("search"));
        if ($countAllowedSearchField > 0) {
            $this->builder = $this->builder->where(function ($query) use ($keySearch, $allowedSearchField) { //grouping where
                for ($i = 0; $i < count($allowedSearchField); $i++) {
                    if ($i === 0 && $this->builder == null) { // if first field, we use "Where" notation
                        $query->whereRaw('lower(' . $allowedSearchField[$i] . '::text) like (?)', ["%{$keySearch}%"]);
                    } else { // else other field, we use "orWhere" notation
                        $query->orWhereRaw('lower(' . $allowedSearchField[$i] . '::text) like (?)',  ["%{$keySearch}%"]);
                    }
                }
            });
        }
    }
}
