<?php

namespace App\Modules\IAM\Presentation\Route;

use App\Modules\IAM\Presentation\Controller\MitraController;
use App\Modules\IAM\Presentation\Controller\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserController::class, 'login']);
Route::middleware('jwt')->group( function () {
    Route::post('/create_mitra', [MitraController::class, 'createMitra']);
    Route::get('/me', [UserController::class, 'me']);
});
