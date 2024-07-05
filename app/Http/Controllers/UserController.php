<?php

namespace App\Http\Controllers;

use App\Http\Services\BaseService;
use App\Http\Services\UserService;
use Illuminate\Http\Request;

class UserController extends BaseApiController
{
    protected BaseService $service;
    function __construct(UserService $service)
    {
        return $this->service = $service;
    }
}
