<?php

use App\Http\Controllers\BrandRentBoardingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/api/user', function (Request $request) {
    return $request->user();
});

Route::middleware(["auth:santum", "admin", "owner"])->group(function() {
    Route::get("/api/kos", [BrandRentBoardingController::class, "index"]);
    Route::post("/api/kos/create", [BrandRentBoardingController::class, "create"]);
    Route::put("/api/kos/update/{id}", [BrandRentBoardingController::class, "update"]);
    Route::delete("/api/kos/delete{id}", [BrandRentBoardingController::class, "delete"]);
    Route::get('/brands/{id}', [BrandRentBoardingController::class, 'show']);
});