<?php

namespace App\Modules\Inventory\Core\Application\Service\FindItem;

use App\Exceptions\ExpectedException;
use App\Modules\Inventory\Core\Domain\Model\Item\ItemId;
use App\Modules\Inventory\Core\Domain\Model\Mitra\MitraId;
use App\Modules\Inventory\Core\Domain\Repository\IInventoryRepository;
use App\Modules\Inventory\Core\Domain\Repository\IItemRepository;
use App\Modules\Inventory\Core\Domain\Repository\IMitraRepository;
use App\Modules\Inventory\Core\Domain\Service\IItemPhotoManager;
use App\Modules\Shared\Model\Account;
use App\Modules\Shared\Model\RoleAccount\MitraAccount;

class FindItemService
{
    private IItemRepository $item_repository;
    private IMitraRepository $mitra_repository;
    private IItemPhotoManager $photo_manager;

    /**
     * @param IItemRepository $item_repository
     * @param IMitraRepository $mitra_repository
     * @param IItemPhotoManager $photo_manager
     */
    public function __construct(IItemRepository $item_repository, IMitraRepository $mitra_repository, IItemPhotoManager $photo_manager)
    {
        $this->item_repository = $item_repository;
        $this->mitra_repository = $mitra_repository;
        $this->photo_manager = $photo_manager;
    }

    /**
     * @throws \App\Exceptions\ExpectedException
     */
    public function execute(FindItemRequest $request, Account $account): FindItemResponse
    {
        $item = $this->item_repository->find(new ItemId($request->getItemId()));
        if ($account instanceof MitraAccount) {
            $mitra = $this->mitra_repository->find(new MitraId($account->getRoleId()));
            if (!$mitra || $mitra->getInventoryId()->toString() != $item->getInventoryId()->toString()) {
                throw new ExpectedException("Mitra has no access to this Inventory!", 1012);
            }
        }
        return new FindItemResponse(
            $item->getName(),
            $item->getSkuId()->toString(),
            $item->getUnitdata()->getUnitPrice(),
            $item->getUnitdata()->getStock(),
            $item->getUnitdata()->getUnit(),
            $this->photo_manager->getPhotoUrl($item),
            $item->getDimension()->getLength(),
            $item->getDimension()->getWidth(),
            $item->getDimension()->getHeight(),
            $item->getDimension()->getWeight()
        );
    }
}
