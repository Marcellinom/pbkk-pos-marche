<?php

namespace App\Modules\Inventory\Core\Application\Service\GetAllItem;

use App\Exceptions\ExpectedException;
use App\Modules\Inventory\Core\Domain\Model\Inventory\InventoryId;
use App\Modules\Inventory\Core\Domain\Model\Mitra\MitraId;
use App\Modules\Inventory\Core\Domain\Repository\IInventoryRepository;
use App\Modules\Inventory\Core\Domain\Repository\IItemRepository;
use App\Modules\Inventory\Core\Domain\Repository\IMitraRepository;
use App\Modules\Shared\Model\Account;
use App\Modules\Shared\Model\RoleAccount\MitraAccount;

class GetAllItemService
{
    private IInventoryRepository $inventory_repository;
    private IItemRepository $item_repository;
    private IMitraRepository $mitra_repository;

    /**
     * @param IInventoryRepository $inventory_repository
     * @param IItemRepository $item_repository
     * @param IMitraRepository $mitra_repository
     */
    public function __construct(IInventoryRepository $inventory_repository, IItemRepository $item_repository, IMitraRepository $mitra_repository)
    {
        $this->inventory_repository = $inventory_repository;
        $this->item_repository = $item_repository;
        $this->mitra_repository = $mitra_repository;
    }

    /**
     * @throws \App\Exceptions\ExpectedException
     */
    public function execute(GetAllItemRequest $request, Account $account): array
    {
        $inventory = $this->inventory_repository->find(new InventoryId($request->getIdInventory()));
        if ($account instanceof MitraAccount) {
            $mitra = $this->mitra_repository->find(new MitraId($account->getRoleId()));
            if (!$mitra || $inventory->getId()->toString() != $mitra->getInventoryId()->toString()) {
                throw new ExpectedException("Mitra has no access to this Inventory!", 1010);
            }
        }

        $items = $this->item_repository->getByInventoryId($inventory->getId());
        $responses = [];
        foreach ($items as $item) {
            $responses[] = new GetAllItemResponse(
                $item->getId()->toString(),
                $item->getName(),
                $item->getSkuId()->toString(),
                $item->getUnitdata()->getUnitPrice(),
                $item->getUnitdata()->getStock(),
                $item->getUnitdata()->getUnit()
            );
        }
        return $responses;
    }
}
