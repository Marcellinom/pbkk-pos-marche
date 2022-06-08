<?php

namespace App\Modules\Inventory\Presentation\Route;

use App\Modules\Inventory\Presentation\Controller\InventoryController;
use App\Modules\Inventory\Presentation\Controller\ItemController;
use Illuminate\Support\Facades\Route;

Route::middleware('iam')->group(function () {
    Route::get('/get_all_inventory', [InventoryController::class, 'getAllInventory']);
    Route::post('/create_inventory', [InventoryController::class, 'createInventory']);
    Route::get('/get_all_items', [ItemController::class, 'getAllItem']);
    Route::get('/find_item', [ItemController::class, 'findItem']);
    Route::post('/add_item', [ItemController::class, 'addItem']);
});
