<?php

namespace App\Trait;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait HelperTrait
{
    function generateCode(string $model, string $prefix)
    {
        $instance = new $model;
        $max = $instance->max('id');
        $currentDate = Carbon::now()->format('dmYhi');
        return $prefix . $currentDate . str_pad($max + 1, 5, '0', STR_PAD_LEFT);
    }

    function changeDirectory($origin, $destination)
    {
        Storage::makeDirectory("/public/files/{$destination}");
        $ext = explode('.', $origin)[1];
        $fileName = Str::random(40);
        $result = "/public/files/{$destination}/{$fileName}.{$ext}";
        Storage::move(str_replace('storage', 'public', $origin), $result);
        return str_replace('public', 'storage', $result);
    }
    function response(string $message, mixed $data = 'No Data', int $status = 200)
    {
        return response()->json(['message' => $message, 'data' => $data, 'status' => $status], $status);
    }
}
