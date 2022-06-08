<?php

namespace App\Modules\IAM\Presentation\Route;

use App\Modules\IAM\Presentation\Controller\MitraController;
use Illuminate\Support\Facades\Route;

Route::middleware('jwt')->group( function () {
    Route::post('/create_mitra', [MitraController::class, 'createMitra']);
});
