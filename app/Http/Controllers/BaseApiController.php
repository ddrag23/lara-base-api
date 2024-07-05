<?php

namespace App\Http\Controllers;

use App\Constants\ResponseConstant;
use App\Http\Services\BaseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

abstract class BaseApiController extends Controller
{
    protected BaseService $service;

    function index(Request $request): JsonResponse
    {
        $data = $this->service->all($request);
        return $this->generateResponse(ResponseConstant::READ, $data);
    }

    function store(Request $request): JsonResponse
    {
        $data = $this->service->create($request->all());
        return $this->generateResponse(ResponseConstant::WRITE, $data);
    }

    function update(Request $request, $id): JsonResponse
    {
        $data = $this->service->update($id, $request->all());
        return $this->generateResponse(ResponseConstant::UPDATE, $data);
    }

    function show($id): JsonResponse
    {
        $data = $this->service->detail($id);
        return $this->generateResponse(ResponseConstant::DETAIL, $data);
    }

    function destroy($id): JsonResponse
    {
        $data = $this->service->delete($id);
        return $this->generateResponse(ResponseConstant::DELETE, $data);
    }
}
