<?php

namespace App\Modules\Inventory\Core\Domain\Service;

use App\Modules\Inventory\Core\Domain\Model\Item\ItemId;
use Illuminate\Http\UploadedFile;

interface IItemPhotoManager
{
    public function savePhoto(ItemId $id, UploadedFile $file): string;

    public function getPhotoUrl(ItemId $id): string;
}
