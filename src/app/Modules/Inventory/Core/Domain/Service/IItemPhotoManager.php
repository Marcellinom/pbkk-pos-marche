<?php

namespace App\Modules\Inventory\Core\Domain\Service;

use App\Modules\Inventory\Core\Domain\Model\Item\Item;
use Illuminate\Http\UploadedFile;

interface IItemPhotoManager
{
    public function savePhoto(Item $item, UploadedFile $file): void;

    public function getPhotoUrl(Item $item): string;
}
