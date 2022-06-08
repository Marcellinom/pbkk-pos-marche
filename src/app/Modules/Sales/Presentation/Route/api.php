<?php

namespace App\Modules\Sales\Presentation\Route;

use App\Modules\Sales\Presentation\Controller\SalesController;
use Illuminate\Support\Facades\Route;

Route::middleware('jwt')->group(function () {
    Route::get('/dashboard', [SalesController::class, 'dashboard']);
});
