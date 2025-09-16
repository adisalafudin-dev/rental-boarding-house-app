<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ["Welcome to our API"];
});

require __DIR__.'/auth.php';
