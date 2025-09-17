<?php

use App\Http\Controllers\BrandRentBoardingController;
use App\Http\Controllers\WilayahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(["admin", "owner"])->group(function() {
    Route::get("/api/kos", [BrandRentBoardingController::class, "index"]);
    Route::post("/api/kos/create", [BrandRentBoardingController::class, "create"]);
    Route::put("/api/kos/update/{id}", [BrandRentBoardingController::class, "update"]);
    Route::delete("/api/kos/delete{id}", [BrandRentBoardingController::class, "delete"]);
    Route::get('/brands/{id}', [BrandRentBoardingController::class, 'show']);

    Route::get('/provinsi', [WilayahController::class, 'getProvinsi']);
    Route::get('/provinsi/{id}/kota', [WilayahController::class, 'getKotaByProvinsi']);
});


Route::middleware("auth:santum")->group(function() {

});
