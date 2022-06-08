<?php

namespace App\Modules\Inventory\Core\Application\Service\CreateInventory;

use App\Modules\Inventory\Core\Domain\Model\Business\BusinessId;
use App\Modules\Inventory\Core\Domain\Model\Inventory\Inventory;
use App\Modules\Inventory\Core\Domain\Model\Inventory\InventoryId;
use App\Modules\Inventory\Core\Domain\Model\Staff\StaffId;
use App\Modules\Inventory\Core\Domain\Repository\IInventoryRepository;
use App\Modules\Inventory\Core\Domain\Repository\IStaffRepository;
use App\Modules\Shared\Model\Account;
use App\Modules\Shared\Model\RoleAccount\BusinessAccount;
use App\Modules\Shared\Model\RoleAccount\StaffAccount;

class CreateInventoryService
{
    private IInventoryRepository $inventory_repository;
    private IStaffRepository $staff_repository;

    /**
     * @param IInventoryRepository $inventory_repository
     * @param IStaffRepository $staff_repository
     */
    public function __construct(IInventoryRepository $inventory_repository, IStaffRepository $staff_repository)
    {
        $this->inventory_repository = $inventory_repository;
        $this->staff_repository = $staff_repository;
    }

    /**
     * @throws \App\Exceptions\ExpectedException
     */
    public function execute(CreateInventoryRequest $request, Account $account): void
    {
        $account->failIfNotClass(BusinessAccount::class, StaffAccount::class);
        $business_id = new BusinessId($account->getRoleId());
        if ($account instanceof StaffAccount) {
            $id = $this->staff_repository->find(new StaffId($account->getroleId()));
            $business_id = $id->getBusinessId();
        }

        $inventory = new Inventory(
            InventoryId::generate(),
            $business_id,
            $request->getName(),
            $request->getAddress(),
            false
        );

        $this->inventory_repository->persist($inventory);
    }
}
