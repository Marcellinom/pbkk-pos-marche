<?php

namespace App\Modules\Business\Presentation\Route;

use App\Modules\Business\Presentation\Controller\BusinessController;
use Illuminate\Support\Facades\Route;

Route::middleware('jwt')->group(function () {
    Route::get('/get_all_mitra', [BusinessController::class, 'getAllMitra']);
});
