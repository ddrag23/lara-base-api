<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('settings')->group(function () {
    Route::apiResource('users', UserController::class);
});
