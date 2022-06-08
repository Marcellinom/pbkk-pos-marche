<?php

namespace App\Modules\Sales\Core\Application\Service\CreateSales;

use App\Exceptions\ExpectedException;
use App\Modules\Sales\Core\Domain\Model\Item\ItemId;
use App\Modules\Sales\Core\Domain\Model\Mitra\MitraId;
use App\Modules\Sales\Core\Domain\Model\Sales\Sales;
use App\Modules\Sales\Core\Domain\Model\Sales\SalesId;
use App\Modules\Sales\Core\Domain\Model\Sales\SalesItem;
use App\Modules\Sales\Core\Domain\Repository\IItemRepository;
use App\Modules\Sales\Core\Domain\Repository\IMitraRepository;
use App\Modules\Sales\Core\Domain\Repository\ISalesRepository;
use App\Modules\Shared\Model\Account;
use App\Modules\Shared\Model\RoleAccount\MitraAccount;
use DateTime;

class CreateSalesService
{
    private ISalesRepository $sales_repository;
    private IItemRepository $item_repository;
    private IMitraRepository $mitra_repository;

    /**
     * @param ISalesRepository $sales_repository
     * @param IItemRepository $item_repository
     * @param IMitraRepository $mitra_repository
     */
    public function __construct(ISalesRepository $sales_repository, IItemRepository $item_repository, IMitraRepository $mitra_repository)
    {
        $this->sales_repository = $sales_repository;
        $this->item_repository = $item_repository;
        $this->mitra_repository = $mitra_repository;
    }

    /**
     * @param CreateSalesRequest[] $requests
     * @param Account $account
     * @return void
     * @throws ExpectedException
     */
    public function execute(array $requests, Account $account): void
    {
        $account->failIfNotClass(MitraAccount::class);
        $mitra = $this->mitra_repository->find(new MitraId($account->getRoleId()));

        $sales_item = [];
        $price_amount = 0;
        foreach ($requests as $request) {
            $item = $this->item_repository->find(new ItemId($request->getIdBarang()));
            if (!$item) {
                throw new ExpectedException("Item not found!", 1017);
            }
            if ($item->getUnitData()->getStock() < $request->getQuantity()) {
                throw new ExpectedException("Item out of Stock", 1018);
            }
            $price_amount += $item->getUnitData()->getTotalPriceForQuantity($request->getQuantity());
            $sales_item[] = new SalesItem($item->getId(), $request->getQuantity());
        }
        $sales = new Sales(
            SalesId::generate(),
            $mitra->getId(),
            $sales_item,
            $mitra->getName(),
            $price_amount,
            new DateTime()
        );
        $this->sales_repository->persist($sales);
    }
}
