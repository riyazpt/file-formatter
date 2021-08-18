<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test\FileContentSearchController;


Route::prefix('/v1')->group(function () {
    Route::group(['prefix' => 'file'], function () {
        Route::get('search', [FileContentSearchController::class, 'index']);
    });
});
