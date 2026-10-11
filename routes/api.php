<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MedicalFileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('students')->group(function () {


    Route::get('/{id}', [StudentController::class, 'show']);

    Route::post('/', [StudentController::class, 'store']);

    Route::post('/{id}', [MedicalFileController::class, 'store']);
});

Route::prefix('medicalfile')->group(function () {


    Route::get('/{id}', [MedicalFileController::class, 'show']);

    Route::put('/{id}', [MedicalFileController::class, 'update']);
});

Route::prefix('categories')->group(function () {


    Route::get('/{id}', [CategoryController::class, 'show']);

    Route::post('/', [CategoryController::class, 'store']);

    Route::post('/{id}', [ProductController::class, 'store']);

    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});

Route::prefix('products')->group(function () {


    Route::get('/{id}', [ProductController::class, 'show']);
});
