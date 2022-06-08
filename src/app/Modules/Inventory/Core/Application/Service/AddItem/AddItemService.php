<?php

namespace App\Modules\Inventory\Core\Application\Service\AddItem;

use App\Exceptions\ExpectedException;
use App\Modules\Inventory\Core\Domain\Model\Inventory\InventoryId;
use App\Modules\Inventory\Core\Domain\Model\Item\Dimension;
use App\Modules\Inventory\Core\Domain\Model\Item\Item;
use App\Modules\Inventory\Core\Domain\Model\Item\ItemId;
use App\Modules\Inventory\Core\Domain\Model\Item\SkuId;
use App\Modules\Inventory\Core\Domain\Repository\IInventoryRepository;
use App\Modules\Inventory\Core\Domain\Repository\IItemRepository;
use App\Modules\Inventory\Core\Domain\Service\IItemPhotoManager;
use App\Modules\Shared\Model\Account;
use App\Modules\Shared\Model\ItemUnitData;
use App\Modules\Shared\Model\RoleAccount\BusinessAccount;
use App\Modules\Shared\Model\RoleAccount\StaffAccount;
use Throwable;

class AddItemService
{
    private IItemRepository $item_repository;
    private IItemPhotoManager $photo_manager;

    /**
     * @param IItemRepository $item_repository
     * @param IItemPhotoManager $photo_manager
     */
    public function __construct(IItemRepository $item_repository, IItemPhotoManager $photo_manager)
    {
        $this->item_repository = $item_repository;
        $this->photo_manager = $photo_manager;
    }

    /**
     * @throws ExpectedException
     */
    public function execute(AddItemRequest $request, Account $account): void
    {
        $account->failIfNotClass(BusinessAccount::class, StaffAccount::class);

        try {
            $image_url = $this->photo_manager->savePhoto($item_id = ItemId::generate(), $request->getPhoto());
        } catch (Throwable $exception) {
            throw new ExpectedException("Failed Saving Item Image", 1014);
        }

        $item = new Item(
            $item_id,
            SkuId::generate(),
            new InventoryId($request->getInventoryId()),
            $request->getName(),
            new ItemUnitData(
                $request->getQuantity(),
                $request->getPrice(),
                $request->getUnit()
            ),
            new Dimension(
                $request->getLength(),
                $request->getWidth(),
                $request->getHeight(),
                $request->getWeight()
            ),
            $image_url
        );

        $this->item_repository->persist($item);
    }
}
