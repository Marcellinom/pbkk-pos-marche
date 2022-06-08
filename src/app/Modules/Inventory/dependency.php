<?php

use App\Modules\Inventory\Core\Domain\Service\IItemPhotoManager;
use App\Modules\Inventory\Infra\Service\ItemPhotoManager;
use Illuminate\Contracts\Foundation\Application;

/** @var Application $app */

$app->singleton(IItemPhotoManager::class, ItemPhotoManager::class);
