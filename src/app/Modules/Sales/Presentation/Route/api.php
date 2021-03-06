<?php

namespace App\Modules\Sales\Presentation\Route;

use App\Modules\Sales\Presentation\Controller\SalesController;
use Illuminate\Support\Facades\Route;

Route::middleware('jwt')->group(function () {
    Route::get('/dashboard', [SalesController::class, 'dashboard']);
    Route::post('/create_sales', [SalesController::class, 'createSales']);
    Route::get('/get_all_sales', [SalesController::class, 'getAllSales']);
});
