<?php

namespace App\Modules\Inventory\Presentation\Route;

use App\Modules\Inventory\Presentation\Controller\InventoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('iam')->group(function () {
    Route::get('/get_all_inventory', [InventoryController::class, 'getAllInventory']);
});
