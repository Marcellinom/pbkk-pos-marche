<?php

namespace App\Modules\Inventory\Infra\Service;

use App\Modules\Inventory\Core\Domain\Model\Item\ItemId;
use App\Modules\Inventory\Core\Domain\Service\IItemPhotoManager;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ItemPhotoManager implements IItemPhotoManager
{

    public function savePhoto(ItemId $id, UploadedFile $file): string
    {
        Storage::disk('local')->put("{$id->toString()}.png", fopen($file, 'r+'));
        return $this->getPhotoUrl($id);
    }

    public function getPhotoUrl(ItemId $id): string
    {
        return Storage::disk('local')->path("{$id->toString()}.png");
    }
}
