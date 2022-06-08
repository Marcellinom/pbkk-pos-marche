<?php

namespace App\Modules\Inventory\Core\Application\Service\GetAllInventory;

use App\Exceptions\ExpectedException;
use App\Modules\Inventory\Core\Domain\Model\Business\BusinessId;
use App\Modules\Inventory\Core\Domain\Model\Staff\StaffId;
use App\Modules\Inventory\Core\Domain\Repository\IInventoryRepository;
use App\Modules\Inventory\Core\Domain\Repository\IStaffRepository;
use App\Modules\Shared\Model\Account;
use App\Modules\Shared\Model\RoleAccount\BusinessAccount;
use App\Modules\Shared\Model\RoleAccount\StaffAccount;

class GetAllInventoryService
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
     * @throws ExpectedException
     */
    public function execute(Account $account): array
    {
        $account->failIfNotClass(BusinessAccount::class, StaffAccount::class);
        $business_id = new BusinessId($account->getRoleId());
        if ($account instanceof StaffAccount) {
            $staff = $this->staff_repository->find(new StaffId($account->getroleId()));
            if (!$staff) throw new ExpectedException("Staff not found", 1011);
            $business_id = $staff->getBusinessId();
        }
        $inventories = $this->inventory_repository->getByBusinessId($business_id);
        $responses = [];
        foreach ($inventories as $inventory) {
            $responses[] = new GetAllInventoryResponse(
                $inventory->getId()->toString(),
                $inventory->getInventoryName(),
                $inventory->getLocation()
            );
        }
        return $responses;
    }
}
